<?php

namespace App\Controllers;

class IndexController{

    public function getIndex(){
        global $pdo;
        $pageTitle = 'Home Blog';
        $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
        return renderHome('../views/home-index.php', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

}