<?php

    // Create a new Blog
    if (isset($_REQUEST['blog_new']))
    {
        // Set parameters
        $param_title = $_REQUEST['blog_title'];
        $param_description = $_REQUEST['blog_description'];
        $param_user_id = $_REQUEST['user_id'];

        $sql = "INSERT INTO blogs (title, description, user_id) VALUES ('$param_title', '$param_description', '$param_user_id')";
        try {
            $conn->query($sql);
            // Redirect to login page
            header("location: index.php?info=blog_created");
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="mb-3">
            <label for="blog_title" class="form-label">Title</label>
            <input class="form-control" type="text" name="blog_title" aria-label="Blog Title">
        </div>
        <div class="mb-3">
            <label for="blog_description" class="form-label">Description</label>
            <textarea class="form-control texteditor" id="blog_description" name="blog_description" cols="30" rows="10"></textarea>
        </div>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'] ?>">
        <button class="btn btn-dark" name="blog_new" type="submit" >Add Post</button>
    </form>
</div>