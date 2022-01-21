<?php
/** @var $conn */
require_once("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Roboto&display=swap');
    </style>
    <title>Gemaakte afspraak</title>
</head>

<body>

    <div class="bodyCon">
        <div class="vorige-btn" type="button">
            <a href="index.php">vorige pagina</a>


            <?php
            $query = "SELECT * FROM gebruikers";
            $result = mysqli_query($conn, $query);

            while ($data = mysqli_fetch_array($result)) {
            ?>
        </div>
        <div class="circle">
            <div class="bevest-txt"><strong>Gelukt!</strong><br>Je hebt een afspraak gemaakt op:<?php echo $data['date'] ?><br>om <?php echo $data['time'] ?></div>
        </div>
        <div class="footer">
            <div class="footer-txt"><strong>contact:</strong> &nbsp; +3106283871 • Dayanara@gmail.com</div>
        </div>
    </div>


<?php
            }
?>

</body>

</html>