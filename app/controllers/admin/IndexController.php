<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class IndexController extends BaseController{

    public function getIndex(){
        global $pdo;
        $pageTitle = 'Admin';
        $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $this->renderAdmin('admin-index.twig', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

}