<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BlogPost;

class IndexController extends BaseController{

    public function getIndex(){
        
        $pageTitle = 'Admin';
        $blogPosts = BlogPost::query()->orderBy('id', 'desc')->get();
        return $this->renderAdmin('admin-index.twig', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

}