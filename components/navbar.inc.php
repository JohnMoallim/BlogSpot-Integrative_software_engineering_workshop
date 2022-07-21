<?php
    // Initialize the session
    if(!isset($_SESSION))
    {
        session_start();
    }

// Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        $current_user = false;
    }
    else
    {
        $current_user = true;
    }
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand logo" href="index.php"><img src="img/logo.png" alt="logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                <a class="nav-link" href="recommended_blogs.php">Recommended Blogs</a>
                <?php
                if( $current_user): ?>
                    <a class="nav-link" href="my_blogs.php">My Blogs</a>
                <?php
                endif; ?>
                <a class="nav-link" href="contact.php">Contact</a>
            </div>
        </div>
        <div class="navbar-nav justify-content-end">
            <?php
            if( !$current_user): ?>
                <a class="nav-link" href="login.php">Login</a>
            <?php endif; ?>

            <?php
                if($current_user): ?>
                <a class="nav-link" href="create_blogs.php">Create New</a>
                <a class="nav-link" href="logout.php">Logout</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

        <!-- Display any info -->
    <?php if(isset($_REQUEST['info'])){ ?>
        <div class="d-flex justify-content-center">
            <div class="alert alert-success alert-dismissible fade show text-center w-50" role="alert">
                <?php if($_REQUEST['info'] == "blog_created"){?>
                    New Blog has been added successfully!
                <?php }?>
                <?php if($_REQUEST['info'] == "blog_updated"){?>
                    Blog has been updated successfully!
                <?php }?>
                <?php if($_REQUEST['info'] == "blog_deleted"){?>
                    Blog has been successfully deleted!
                <?php }?>
                <?php if($_REQUEST['info'] == "email_sent"){?>
                    Email has been sent successfully!
                <?php }?>
                <?php if($_REQUEST['info'] == "email_sending_failed"){?>
                    Email sending failed!
                <?php }?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" id="alert_close"></button>
            </div>
        </div>

        <script type="text/JavaScript">
            document.getElementById("alert_close").addEventListener("click", function(){
                const url = new URL(location);
                url.search = "";
                history.pushState(null, document.title, url);
            });
        </script>

    <?php } ?>