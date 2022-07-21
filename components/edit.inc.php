<?php

    // Get post data based on id
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $sql = "SELECT * FROM blogs WHERE id=$id";
        $current_blog = mysqli_query($conn, $sql);
        $blog = $current_blog->fetch_assoc();
    }

    // Update a post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_REQUEST['id'];
        $title = $_REQUEST['title'];
        $description = $_REQUEST['description'];

        $sql = "UPDATE blogs SET title='$title', description='$description' WHERE id=$id";

        mysqli_query($conn, $sql);
        header("Location: my_blogs.php?info=blog_updated");
        exit();
    }
?>

<div class="container mt-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
            <label for="blog_title" class="form-label">Title</label>
            <input class="form-control" type="text" name="title" aria-label="Blog Title" value="<?= $blog['title'] ?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control texteditor" id="description" name="description" cols="30" rows="10"><?= $blog['description'] ?></textarea>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <button class="btn btn-dark" name="submit" type="submit" >Update Post</button>
    </form>
</div>

