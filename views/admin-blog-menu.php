<?php 
$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
?>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo $baseDir ?>">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $baseDir ?>admin">Admin</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $baseDir ?>post-list">Post</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $baseDir ?>post-list/add">Insert post</a>
        </li>
        </ul>
    </div>
</nav>