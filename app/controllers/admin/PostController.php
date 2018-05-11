<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;

class PostController extends BaseController{
    public function getIndex(){
        
        $pageTitle = 'Post List';
        $blogPosts = BlogPost::all();
        return $this->renderAdmin('admin-post-list.twig', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

    public function getAdd(){
        $pageTitle = 'Add Post';
        return $this->renderAdmin('admin-add-post.twig', ['pageTitle' => $pageTitle]);
    }

    public function postAdd(){
        $blogPost = new BlogPost([
            'title'=>$_POST['title'],
            'content'=>$_POST['content']
        ]);
        $blogPost->save();
        $pageTitle = 'Add Post';
        
        $result = true;
        return $this->renderAdmin('admin-add-post.twig', ['pageTitle' => $pageTitle, 'result' => $result]);
    }
}