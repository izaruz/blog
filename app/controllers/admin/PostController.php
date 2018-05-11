<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use Sirius\Validation\Validator;

class PostController extends BaseController{
    public function getIndex(){
        
        $pageTitle = 'Post List';
        $blogPosts = BlogPost::all();
        return $this->renderAdmin('admin-post-list.twig', [
            'pageTitle' => $pageTitle, 
            'blogPosts' => $blogPosts
        ]);
    }

    public function getAdd(){
        $pageTitle = 'Add Post';
        return $this->renderAdmin('admin-add-post.twig', [
            'pageTitle' => $pageTitle
        ]);
    }

    public function postAdd(){
        $errors = [];
        $result = false;
        $validator = new Validator();
        $validator->add('title', 'required');
        $validator->add('content','required');

        if ($validator->validate($_POST)) {
            $blogPost = new BlogPost([
                'title'=>$_POST['title'],
                'content'=>$_POST['content']
            ]);
            $blogPost->save();
            $result = true;
        } else{
            $errors = $validator->getMessages();
        }

        $pageTitle = 'Add Post';
        
        return $this->renderAdmin('admin-add-post.twig', [
            'pageTitle' => $pageTitle, 
            'result' => $result,
            'errors' => $errors
        ]);
    }
}