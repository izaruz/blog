
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
