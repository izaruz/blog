
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
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($blogPosts as $row): ?>
                        <tr>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["title"]; ?></td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h3>Sidebar</h3>
            </div>
        </div>
    </section>
