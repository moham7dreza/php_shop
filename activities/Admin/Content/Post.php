<?php

namespace Activities\Admin\Content;

use Activities\Admin\Admin;
use Database\Database;


class Post extends Admin
{


    public function index()
    {
        $db = new Database();
        $posts = $db->select("select posts.*, users.email AS email, post_categories.name AS categoryName FROM ((posts INNER JOIN users ON posts.user_id = users.id) INNER JOIN post_categories ON posts.post_category_id = post_categories.id)")->fetchAll();
        require_once BASE_PATH . '/template/admin/content/post/index.php';
    }

    public function create()
    {
        $db = new Database();
        $categories = $db->select('select * from `post_categories`')->fetchAll();
        require_once BASE_PATH . '/template/admin/content/post/create.php';
    }

    public function store($request)
    {
        $db = new Database();
        $realTime = substr($request['published_at'], 0, 10);
        $request['published_at'] = date('Y-m-d H:i:s', (int)$realTime);

        if ($request['post_category_id'] != null) {
            $request['image'] = $this->saveImage($request['image'], 'content-post-images');
            if ($request['image']) {
                $request = array_merge($request, ['user_id' => 1]);
                $db->insert('posts', array_keys($request), $request);
                flash('success', 'عملیات با موفقیت انجام شد');
                $this->redirect('admin/content/post');
            } else {
                flash('validation_error', 'فیلد عکس اجباری میباشد');
                $this->redirectBack();
            }
        } else {
            flash('validation_error', 'فیلد دسته بندی اجباری میباشد');
            $this->redirectBack();
        }
    }


    public function edit($id)
    {
        $db = new Database();
        $categories = $db->select('select * from `post_categories`')->fetchAll();
        $post = $db->select("SELECT * FROM `posts` WHERE id = ?", [$id])->fetch();
        require_once BASE_PATH . '/template/admin/content/post/edit.php';
    }

    public function update($request, $id)
    {
        $db = new Database();
        $realTime = substr($request['published_at'], 0, 10);
        $request['published_at'] = date('Y-m-d H:i:s', (int)$realTime);
        if ($request['post_category_id'] != null) {
            if ($request['image']['tmp_name'] != null) {
                $post = $db->select('select * from `posts` where id = ?', [$id])->fetch();
                $this->removeImage($post['image']);
                $request['image'] = $this->saveImage($request['image'], 'content-post-images');
            } else {
                unset($request['image']);
            }
            $db->update('posts', $id, array_keys($request), $request);
            flash('success', 'عملیات با موفقیت انجام شد');
            $this->redirect('admin/content/post');
        } else {
            flash('validation_error', 'فیلد دسته بندی اجباری میباشد');
            $this->redirectBack();
        }
    }

    public function changeStatus($id)
    {
        $db = new Database();
        $post = $db->select('SELECT * FROM posts WHERE id = ?', [$id])->fetch();
        if ($post) {
            if ($post['status'] == 1) {
                $db->update('posts', $id, ['status'], [2]);
            } else {
                $db->update('posts', $id, ['status'], [1]);
            }
            echo json_encode(['status' => 'ok', 'message' => 'با موفقیت انجام شد']);
            return true;
        } else {
            echo json_encode(['status' => 'failed', 'message' => 'دسته بندی پیدا نشد']);
            return false;
        }
    }

    public function changeCommentable($id)
    {
        $db = new Database();
        $post = $db->select('SELECT * FROM posts WHERE id = ?', [$id])->fetch();
        if ($post) {
            if ($post['commentable'] == 1) {
                $db->update('posts', $id, ['commentable'], [2]);
            } else {
                $db->update('posts', $id, ['commentable'], [1]);
            }
            echo json_encode(['status' => 'ok', 'message' => 'با موفقیت انجام شد']);
            return true;
        } else {
            echo json_encode(['status' => 'failed', 'message' => 'دسته بندی پیدا نشد']);
            return false;
        }
    }


    public function delete($id)
    {
        $db = new Database();
        $post = $db->select("SELECT * FROM `posts` WHERE id = ?", [$id])->fetch();
        if ($post['image']) {
            $this->removeImage($post['image']);
        }
        $db->delete('posts', $id);
        flash('success', 'عملیات با موفقیت انجام شد');
        $this->redirectBack();
    }
}
