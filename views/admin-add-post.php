
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
                    if ( isset($result) && $result ) {
                        echo '<div class="alert alert-success" role="alert">Success!</div>';
                    }
                ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" class="form-control" name="title" id="title" aria-describedby="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
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
