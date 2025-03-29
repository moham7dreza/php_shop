<?php

namespace Activities\Admin\Market;

use Activities\Admin\Admin;
use Database\Database;


class Comment extends Admin
{


    public function index()
    {
        $db = new Database();
        $comments = $db->select("select comments.*, users.email AS email, products.name AS product_name FROM ((comments INNER JOIN users ON comments.user_id = users.id) INNER JOIN products ON comments.product_id = products.id)")->fetchAll();
        foreach ($comments as $comment) {
            if ($comment['status'] == 'unseen') {
                $db->update('comments', $comment['id'], ['status'], ['seen']);
            }
        }
        require_once BASE_PATH . '/template/admin/content/comment/index.php';
    }


    public function show($id)
    {
        $db = new Database();
        $comment = $db->select("select comments.*, users.email AS email, posts.title AS post_title FROM ((comments INNER JOIN users ON comments.user_id = users.id) INNER JOIN posts ON comments.post_id = posts.id) WHERE comments.id = ?", [$id])->fetch();

        $replies =  $db->select("select comments.*, users.email AS email, posts.title AS post_title FROM ((comments INNER JOIN users ON comments.user_id = users.id) INNER JOIN posts ON comments.post_id = posts.id) WHERE comments.parent_id = ?", [$id])->fetchAll();
        require_once BASE_PATH . '/template/admin/content/comment/show.php';
    }

    public function changeStatus($request, $id)
    {
        $request = json_decode(file_get_contents("php://input"));

        $db = new Database();
        $category = $db->select('SELECT * FROM comments WHERE id = ?', [$id])->fetch();
        if ($category) {
            if ($request->value == 'approved' || $request->value == 'seen') {
                $db->update('comments', $id, ['status'], [$request->value]);
                echo json_encode(['status' => 'ok', 'message' => 'با موفقیت انجام شد']);
                return true;
            } else {
                echo json_encode(['status' => 'failed', 'message' => 'وضعیت پیدا نشد']);
                return false;
            }
        } else {
            echo json_encode(['status' => 'failed', 'message' => 'دسته بندی پیدا نشد']);
            return false;
        }
    }

    public function answer($request, $id)
    {

        $db = new Database();
        $comment = $db->select('select * from comments where id = ?', [$id])->fetch();
        $request = ['body' => $request['answer'], 'parent_id' => $comment['id'], 'status' => 'seen', 'user_id' => 1, 'post_id' => $comment['post_id']];
        $db->insert('comments', array_keys($request), $request);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirect('admin/content/comment');
    }
}
