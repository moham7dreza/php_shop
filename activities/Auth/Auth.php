<?php

namespace Activities\Auth;

use Activities\Services\SmsService;
use Database\Database;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Auth
{

    private function generateOtp()
    {
        return rand(1000, 9999);
    }

    private function storeOtp($otpCode, $userId = null)
    {
        $db = new Database();
        $expireAt = date('Y-m-d H:i:s', strtotime('+5 minutes'));
        $db->insert('user_otps', ['user_id', 'otp_code', 'expired_at'], [$userId, $otpCode, $expireAt]);
    }

    public function sendOtp($phoneNumber, $userId = null)
    {
        $otp = $this->generateOtp();
        $this->storeOtp($otp, $userId);

        $smsService = new SmsService();
        $smsService->sendSmsOtp($phoneNumber, $otp);
    }



    protected function redirect($url)
    {
        header("Location: " . trim(CURRENT_DOMAIN, '/ ') . '/' . trim($url, '/ '));
        exit;
    }

    protected function redirectBack()
    {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit;
    }

    private function hash($password)
    {
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        return $hashPassword;
    }

    private function random()
    {
        return bin2hex(openssl_random_pseudo_bytes(32));
    }

    private function activationMessage($username, $verifyToken)
    {
        $message = '<h1>فعال سازی حساب کاریری</h1>
        <p>' . $username . 'عزیز برای فعال سازی حساب کاریری خود روی لینک زیر کلیک نمایید</p>
        <a href="' . url('activation/' . $verifyToken) . '">فعال سازی</a>';
        return $message;
    }

    public function sendMail($emailAddress, $subject, $body)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->CharSet       = 'UTF-8';                     //Set the SMTP server to send through
            $mail->Host       = MAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = SMTP_AUTH;                                   //Enable SMTP authentication
            $mail->Username   = MAIL_USERNAME;                     //SMTP username
            $mail->Password   = MAIL_PASSWORD;                               //SMTP password
            $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
            $mail->Port       = MAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom(SENDER_MAIL, SENDER_NAME);
            $mail->addAddress($emailAddress);     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->send();
            return true;
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

    public function loginRegister()
    {
        require_once BASE_PATH . '/template/auth/login-register.php';
    }

    public function loginRegisterStore($request)
    {

        if (empty($request['mobile']) || !preg_match('/^09\d{9}$/', $request['mobile'])) {
            flash('input_error', 'شماره وارد شده صحیح نمیباشد');
            $this->redirectBack();
            return;
        }

        $db = new Database();
        $user = $db->select('select * from users where mobile = ?', [$request['mobile']])->fetch();
        //register

        if ($user == null) {
            $request['password'] = $this->hash($this->random());
            $db->insert('users', ['mobile', 'password'], [$request['mobile'], $request['password']]);
            $this->sendOtp($request['mobile']);
            $this->redirect('otp-verify?phoneNumber=' . $request['mobile']);
        }
        // login
        else {
            $this->sendOtp($request['mobile'], $user['id']);
            $this->redirect('otp-verify?phoneNumber=' . $request['mobile']);
        }
    }


    public function verifyOtpView()
    {
        require_once BASE_PATH . '/template/auth/otp-verify.php';
    }

    public function verifyOtp($otpCode, $phoneNumber)
    {

        $db = new Database();

        $otpRecord = $db->select('select * from user_otps where otp_code = ? AND expired_at > NOW()', [$otpCode])->fetch();

        if ($otpRecord == null) {
            return false;
        } else {
            $db->delete('user_otps', $otpRecord['id']);
            $user = $db->select('select * from users where mobile = ?', [$phoneNumber])->fetch();
            if ($user && $user['is_active'] == 0) {
                $db->update('users', $user['id'], ['is_active'], [1]);
            }

            return true;
        }
    }

    public function verifyOtpStore($request)
    {

        if (empty($request['otp']) || empty($request['phoneNumber'])) {
            flash('input_error', 'تمامی فیلد ها الزامی میباشند');
            $this->redirectBack();
            return;
        }

        if (!preg_match('/^09\d{9}$/', $request['phoneNumber'])) {
            flash('input_error', 'شماره وارد شده صحیح نمیباشد');
            $this->redirectBack();
            return;
        }

        if ($this->verifyOtp($request['otp'], $request['phoneNumber'])) {
            $db = new Database();
            $user = $db->select('select * from users where mobile = ?', [$request['phoneNumber']])->fetch();
            if ($user && $user['is_active'] == 1) {
                $_SESSION['user'] = $user['id'];
                $this->redirect('/');
            } else {
                $_SESSION['user'] = $user['id'];
                $this->redirect('/');
            }
        } else {
            flash('otp_error', 'کد وارد شده صحیح نمیباشد');
            $this->redirectBack();
        }
    }

    public function activation($verify_token)
    {
        // $db = new Database();
        // $user = $db->select("SELECT * FROM users WHERE `verify_token` = ?", [$verify_token])->fetch();
        // if ($user == null) {
        //     flash('activation_error', 'کاربری یافت نشد');
        //     $this->redirect('register');
        // } else {
        //     $db->update('users', $user['id'], ['is_active'], [1]);
        //     $this->redirect('login');
        // }
    }


    public function login()
    {
        // require_once BASE_PATH . '/template/auth/login.php';
    }

    public function loginStore($request)
    {
        // if (empty($request['email']) || empty($request['password'])) {
        //     flash('login_error', 'تمامی فیلد ها الزامی میباشند');
        //     $this->redirect('login');
        // } else {
        //     $db = new Database();
        //     $user = $db->select('SELECT * FROM users WHERE `email` = ?', [$request['email']])->fetch();
        //     if ($user != null) {
        //         if (password_verify($request['password'], $user['password']) && $user['is_active'] == 1) {
        //             $_SESSION['user'] = $user['id'];
        //             $this->redirect('admin/category');
        //         } else {
        //             flash('login_error', 'رمز عبور یا ایمیل نامعتبر است');
        //             $this->redirect('login');
        //         }
        //     } else {
        //         flash('login_error', 'رمز عبور یا ایمیل نامعتبر است');
        //         $this->redirect('login');
        //     }
        // }
    }

    public function logout()
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
        $this->redirect('login-register');
    }


    public function checkAdmin()
    {
        if (isset($_SESSION['user'])) {
            $db = new Database();
            $user = $db->select("SELECT * FROM users WHERE id = ?", [$_SESSION['user']])->fetch();
            if ($user != null) {
                if ($user['permission'] != 'admin') {
                    $this->redirect('home');
                }
            } else {
                $this->redirect('home');
            }
        } else {
            $this->redirect('home');
        }
    }
}
