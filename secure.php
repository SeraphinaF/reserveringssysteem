
<?php
session_start();

//May I even visit this page?
if (!isset($_SESSION["email"])) {
    header("Location: login.php");
    exit;
}
// //Get email from session
// $email = $_SESSION['email'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Veilige pagina</title>
</head>
<body>
<h2>Boekingen</h2>
<p>Welkom Dayanara!</p>
<!--<p>Welkom, --><?//= $email ?><!--</p>-->

</body>
</html>