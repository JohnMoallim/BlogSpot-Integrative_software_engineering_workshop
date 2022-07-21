<?php

    // Delete Blog
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        $sql = "DELETE FROM blogs WHERE id= $id";
        mysqli_query($conn, $sql);
        header("Location: my_blogs.php?info=blog_deleted");
        exit();
    }
?>

