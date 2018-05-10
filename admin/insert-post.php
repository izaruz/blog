<?php 
include_once '../include/config.php';

$result = false;
if (!empty($_POST)) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $sql = "INSERT INTO blog_post(title, content) VALUES(:title, :content)";
    $query = $pdo->prepare($sql);

    $result = $query->execute([
        'title'=>$title,
        'content'=>$content
    ]);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Insert</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../app.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    
</head>
<body>

    <?php include("blog-menu-admin.php"); ?>

    <section class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>New post</h1>
            </div>
        </div>
    </section>

    <section class="container">
        <div class="row">
            <div class="col-md-8">
                <?php 
                    if ($result) {
                        echo '<div class="alert alert-success" role="alert">Success!</div>';
                    }
                ?>
                <form action="insert-post.php" method="POST">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="content">Small textarea</label>
                        <textarea class="form-control rounded-0" id="content" name="content" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Add post</button>
                </form>
            </div>
            <div class="col-md-4">
                <h3>Sidebar</h3>
            </div>
        </div>
    </section>

    <?php include("../footer.php"); ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="../app.js"></script>
</body>
</html>