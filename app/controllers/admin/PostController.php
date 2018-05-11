<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class PostController extends BaseController{
    public function getIndex(){
        // /post-list or post-list/index
        global $pdo;
        $pageTitle = 'Post List';
        $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $this->renderAdmin('admin-post-list.twig', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

    public function getAdd(){
        $pageTitle = 'Add Post';
        return $this->renderAdmin('admin-add-post.twig', ['pageTitle' => $pageTitle]);
    }

    public function postAdd(){
        global $pdo;
        $pageTitle = 'Add Post';
        $title = $_POST['title'];
        $content = $_POST['content'];

        $sql = "INSERT INTO blog_post(title, content) VALUES(:title, :content)";
        $query = $pdo->prepare($sql);

        $result = $query->execute([
            'title'=>$title,
            'content'=>$content
        ]);
        return $this->renderAdmin('admin-add-post.twig', ['pageTitle' => $pageTitle, 'result' => $result]);
    }
}