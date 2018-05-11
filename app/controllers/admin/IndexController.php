<?php

namespace App\Controllers\Admin;

class IndexController{

    public function getIndex(){
        global $pdo;
        $pageTitle = 'Admin';
        $query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
        $query->execute();

        $blogPosts = $query->fetchAll(\PDO::FETCH_ASSOC);
        return renderAdmin('../views/admin-index.php', ['pageTitle' => $pageTitle, 'blogPosts' => $blogPosts]);
    }

}