<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class IndexController extends BaseController{

    public function getIndex(){
        global $pdo;
        $pageTitle = 'Home Blog';
        $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $this->renderHome('home-index.twig', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

}