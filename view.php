<?php
session_start();
/** @var $conn */
require_once("connection.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Roboto&display=swap');
    </style>
    <title>Document</title>
</head>

<body>
    <table class="inhoud-tabel">
        <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Telefoonnummer</th>
            <th>Haarstijl</th>
            <th>Haarlengte</th>
            <th>Datum</th>
            <th>Tijd</th>
        </tr>

        <?php
        $query = "SELECT * FROM gebruikers";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $firstname = strip_tags ($row['first_name']);
                $lastname = strip_tags ($row['last_name']);
                $email =strip_tags ( $row['email']);
                $phonenumber = strip_tags ($row['phone_number']);
                $hairstyle = strip_tags ($row['hairstyle']);
                $hairlength =strip_tags ( $row['hairlength']);
                $date = strip_tags ($row['date']);
                $time = strip_tags ($row['time']);
                echo
                
                '<tr>
                <td>' . $id . '</td>
                <td>' . $firstname . '</td>
                <td>' . $lastname . '</td>
                <td>' . $email . '</td>
                <td>' . $phonenumber . '</td>
                <td>' . $hairstyle . '</td>
                <td>' . $hairlength . '</td>
                <td>' . $date . '</td>
                <td>' . $time . '</td>
                <td>
                <button><a href="delete.php?id=' . $id . '">Delete</a></button>
                <button><a href="edit.php?id=' . $id . '">wijzigen</a></button>
                
                
                </td>
</tr>';
            }
        }
        ?>
        <p><a href="logout.php">Uitloggen</a></p>

    </table>
</body>

</html>