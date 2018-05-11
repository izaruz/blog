<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BlogPost;

class IndexController extends BaseController{

    public function getIndex(){
       
        $pageTitle = 'Home Blog';
        $blogPosts = BlogPost::query()->orderBy('id', 'desc')->get();
        return $this->renderHome('home-index.twig', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

}