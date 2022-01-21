<?php
session_start();
require_once("connection.php");
if (isset($_SESSION["email"])) {
    header("location:view.php");
}
// $password = password_hash('dayaHair1', PASSWORD_DEFAULT);
// $query = "INSERT INTO login (email, password) VALUES ('seraphina.fortunato@gmail.com', '$password')";

// $result = mysqli_query($conn, $query);

if (isset($_POST["submit"])) {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo 'Beide velden moeten worden ingevuld';
    } else {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = $_POST["password"];
        $query = "SELECT * FROM `login` WHERE email = '$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            // echo $password;
            // exit;
            if (password_verify($password, $row["password"])) {
                //return true;  
                $_SESSION["email"] = $email;
                header("location:view.php");
            } else {
                //return false;  
                echo 'De combinatie email en wachtwoord is onbekend';
            }
        } else {
            echo 'De combinatie email en wachtwoord is onbekend';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            text-align: center;
        }

        .field {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="inlog-wrap">
        <h2>Please Login</h2>
        <form action="" method="post">
            <input type="email" class="email" name="email" placeholder="Email" required=""><br />
            <input type="password" class="password" name="password" placeholder="Wachtwoord" required=""><br />
            <button type="submit" class="btn-login" name="submit">Inloggen</button>
            <!-- <button type = "submit" class = "btn-inlog" name = "login" value = "Login">Inloggen</button> -->
        </form>
    </div>

</body>

</html>