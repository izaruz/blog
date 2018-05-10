<?php 
include_once 'include/config.php';

$query = $pdo->prepare('SELECT * FROM blog_post ORDER BY id DESC');
$query->execute();

$blogPosts = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="app.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add.php">Add user</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="list.php">List users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            </ul>
        </div>
    </nav>

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog title</h1>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach ($blogPosts as $blogPost): ?>
                <div class="blog-post">
                    <h3><?php echo $blogPost['title'] ?></h3>
                    <p>Jan 1, 2018 by <a href="#">Isaac</a></p>
                    <div class="blog-post-image">
                        <img src="images/post-1.jpg" alt="">
                    </div>
                    <div class="blog-post-content">
                        <p><?php echo $blogPost['content'] ?></p>
                    </div>
                </div>
                <?php endforeach?>
            </div>
            <div class="col-md-4">
                <h3>Sidebar</h3>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-12">
                <footer>
                    <p>Isaac Villatoro</p>
                    <a href="admin/index.php">Contact</a>
                </footer>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="app.js"></script>
</body>
</html>