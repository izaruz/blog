<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;
use App\Models\User;

class IndexController extends BaseController{

    public function getIndex(){
        
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::find($userId);
        }

        if ($user) {
            $pageTitle = 'Admin';
            $blogPosts = BlogPost::query()->orderBy('id', 'desc')->get();
            return $this->renderAdmin('admin-index.twig', [
                'pageTitle' => $pageTitle, 
                'blogPosts' => $blogPosts,
                'user' => $user
            ]);
        }

        header('Location:' . BASE_URL . 'auth/login');
        
    }

}