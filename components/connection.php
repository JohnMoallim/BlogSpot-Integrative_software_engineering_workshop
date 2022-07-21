<?php
// DataBase Connection

// Don't display server errors
ini_set("display_errors", "off");

$dbServername = getenv('CLEARDB_SERVER_NAME');
$dbUsername = getenv('CLEARDB_USERNAME');
$dbPassword = getenv('CLEARDB_PASSWORD');
$dbName = getenv('DATABASE_NAME');

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


// Destroy if not possible to create a connection
if (!$conn) {
    echo "<h3 class='container bg-dark p-3 text-center text-warning rounded-lg mt-5'>Not able to establish Database Connection<h3>";
}
// Get post data based on id
if (isset($_REQUEST['blog_id'])) {
    $id = $_REQUEST['id'];
    $sql = "SELECT * FROM blogs WHERE id = $id";
    $query = mysqli_query($conn, $sql);
}

// Delete a post
if (isset($_REQUEST['blog_delete'])) {
    echo "delete????";
    $id = $_REQUEST['id'];

    $sql = "DELETE FROM blogs WHERE $id";
    mysqli_query($conn, $sql);

    header("Location: index.php");
    exit();
}

?>