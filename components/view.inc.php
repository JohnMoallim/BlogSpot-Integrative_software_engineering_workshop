<?php
// Initialize the session
if(!isset($_SESSION))
{
    session_start();
}

    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: login.php");
        exit;
    }

    $user_id = $_SESSION['id'];

    // Get all my blogs
    $sql = "SELECT * FROM blogs WHERE user_id=$user_id ";
    $blogs = mysqli_query($conn, $sql);

?>

<div class="d-flex justify-content-center m-5">
    <table class="table table-hover table-striped table-bordered w-75">
        <thead class="table-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <?php foreach($blogs as $blog){?>
                <tr>
                    <td><?php echo $blog['title'];?></td>
                    <td><?php echo $blog['description'];?></td>
                    <td>
                        <form method="POST">
                            <a href="edit_blog.php?id=<?php echo $blog['id']?>" class="btn btn-secondary btn-sm m-2">Edit</a>
                            <a href="delete_blog.php?id=<?php echo $blog['id']?>" class="btn btn-danger btn-sm m-2">Delete</a>
                        </form>
                    </td>
                </tr>
        <?php };?>
        </tbody>
    </table>
</div>