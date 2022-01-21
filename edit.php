<?php
// session_start();
/** @var $conn */
require_once("connection.php");

// if (!isset($_SESSION['email'])) {
//     header("Location: login.php");
//     exit;
// }

$id = $_GET['id'];
$query = "SELECT * FROM gebruikers WHERE id=$id";
$result = mysqli_query($conn, $query);

if (isset($_POST['update'])) {
    $firstname = strip_tags ($_POST['voornaam']);
    $lastname = strip_tags ($_POST['achternaam']);
    $email = strip_tags ($_POST['email']);
    $phonenumber =strip_tags  ($_POST['telefoon']);
    $date = strip_tags ($_POST['date']);
    $time =strip_tags ($_POST['time']);

    $query = "UPDATE gebruikers SET first_name = '$firstname', last_name = '$lastname', email = '$email', phone_number = '$phonenumber', date= '$date', time='$time' WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if ($result) {
        mysqli_close($conn);
        header("location:view.php");
    } else {
        echo 'niet gelukt helaas. Maar blijf proberen!';
    }
}

?>

<?php
$id = $_GET['id'];
$query = "SELECT * FROM gebruikers WHERE id=$id";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
?>
    <form method="POST">
        <input type="text" name="voornaam" value="<?php echo strip_tags ($row['first_name']) ?>" placeholder="Voornaam">
        <input type="text" name="achternaam" value="<?php echo strip_tags ($row['last_name']) ?>" placeholder="Achternaam">
        <input type="text" name="email" value="<?php echo strip_tags ($row['email']) ?>" placeholder="Email" Required>
        <input type="text" name="telefoon" value="<?php echo strip_tags ($row['phone_number']) ?>" placeholder="Telefoon">
        <input type="text" name="haarstijl" value="<?php echo strip_tags ($row['hairstyle']) ?>" placeholder="haarstijl">
        <input type="text" name="haarlengte" value="<?php echo strip_tags ($row['hairlength']) ?>" placeholder="haarlengte">
        <input type="date" name="date" value="<?php echo strip_tags ($row['date'] )?>" placeholder="Datum">
        <input type="time" name="time" value="<?php echo strip_tags ($row['time']) ?>" placeholder="Tijd">
        <input type="submit" name="update" value="Update">
    </form>

<?php
}
?>