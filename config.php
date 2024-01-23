<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "./connect.php";

try {
    $capsule->addConnection([
        'driver' => 'mysql',
        'host' => 'localhost',
        'database' => 'php_shop',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
    ]);
} catch (Exception $exception) {
    var_dump('salam');
}


$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();


use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'image',
        'status',
    ];
}

if (0) {
    try {
        Illuminate\Database\Capsule\Manager::schema()->create('post_categories', function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'innodb';
            $table->id();
            $table->string('name', 50)->fulltext();
            $table->string('description')->fulltext();
            $table->string('slug', 50)->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('status')->default(1)->index();
            $table->timestamps();
        });

    } catch (Exception $exception) {
        var_dump($exception->getMessage());
    }
}