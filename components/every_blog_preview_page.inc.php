<?php
    if (isset($_SESSION['id']) )
        {
            $user_id = $_SESSION['id'];
        }

    // Get all blogs
    $sql = "SELECT * FROM blogs";
    $blogs = mysqli_query($conn, $sql);

    // Update a post
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_REQUEST['add_star']))
        {
            $id = $_REQUEST['add_star'];
            $sql = "SELECT * FROM blogs WHERE id=$id";
            $current_blog = mysqli_query($conn, $sql);
            $blog = $current_blog->fetch_assoc();
            $stars = ++$blog['stars'];
            $sql = "UPDATE blogs SET stars='$stars' WHERE id=$id";
        }

        if (isset($_REQUEST['remove_star']))
        {
            $id = $_REQUEST['remove_star'];
            $sql = "SELECT * FROM blogs WHERE id=$id";
            $current_blog = mysqli_query($conn, $sql);
            $blog = $current_blog->fetch_assoc();
            $stars = --$blog['stars'];
            $sql = "UPDATE blogs SET stars='$stars' WHERE id=$id";
        }

        mysqli_query($conn, $sql);
        header("Location: index.php");
        exit();
    }


     $name_err = $message_err = $email_err = ""

?>


<div class="container" style="width:100%;">
    <div class="row">
        <div class="col-8">
            <div class="row row-cols-2">
                <?php foreach($blogs as $blog){?>
                    <div class="col">
                        <div class="card m-2">
                            <h5 class="card-header"><?= $blog['title'] ?></h5>
                            <div class="card-body">
                                <div class="card-text"><?= $blog['description'] ?></div>
                                <form method="POST">
                                    <button class="btn btn-primary position-relative float-end m-2" name="add_star" value="<?= $blog['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Rate +">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                                        </svg>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                <?php echo $blog['stars'] ?>
                            </span>
                                    </button>

                                    <button class="btn btn-primary position-relative float-end m-2" name="remove_star" value="<?= $blog['id'] ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="Rate -">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                            <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-4">
            <?php include_once ("contact_us_form.inc.php"); ?>

        </div>
    </div>
</div>


    <style type="text/css">
        .contact_us_form
        {
            background-image: url('img/contact_us_bg.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>