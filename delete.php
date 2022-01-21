<?php
// session_start();
/** @var $conn */
// require_once ("connection.php");
// if (!isset($_SESSION['email'])) {
//     header("Location: login.php");
//     exit;
// }

$id = $_GET['id'];
$del = mysqli_query($conn,"delete from gebruikers where id = '$id'");

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:view.php"); // redirects to view.php (all data)
}
else
{
    echo "Het verwijderen is helaas niet gelukt"; // display error message if not delete
}


