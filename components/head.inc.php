<?php
    include_once "connection.php";
    // Initialize the session
    if(!isset($_SESSION))
    {
        session_start();
    }

if((!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) && ( strcasecmp($_SERVER['PHP_SELF'],'/blog/create_blogs.php') === 0 || strcasecmp($_SERVER['PHP_SELF'],'/blog/edit_blog.php') === 0 || strcasecmp($_SERVER['PHP_SELF'],'/blog/my_blogs.php') === 0))
    {
        echo "<SCRIPT> //not showing me this
        alert('Please Sign in First')
        window.location.replace('login.php');
    </SCRIPT>";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BlogSpot PHP Project</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap"
      rel="stylesheet"
    />
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.3/tinymce.min.js" ></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>