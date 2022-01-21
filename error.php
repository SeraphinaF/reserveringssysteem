<?php
require_once("connection.php");

// 'Post back' with the data from the form.
// $firstname = mysqli_real_escape_string($conn, $_POST['voornaam']);
// $lastname =  mysqli_real_escape_string($conn, $_POST['achternaam']);
// $email =  mysqli_real_escape_string($conn, $_POST['email']);
// $phonenumber =  mysqli_real_escape_string($conn, $_POST['telefoon']);

//Error messages


if (isset($_POST['submit'])) {
    //Set form variables
    $firstname = mysqli_real_escape_string($conn, $_POST['voornaam']);
    $lastname =  mysqli_real_escape_string($conn, $_POST['achternaam']);
    $email =  mysqli_real_escape_string($conn, $_POST['email']);
    $phonenumber =  mysqli_real_escape_string($conn, $_POST['telefoon']);
    $hairstyle =  mysqli_real_escape_string($conn, $_POST['hairstyle']);
    $hairlength =  mysqli_real_escape_string($conn, $_POST['hairlength']);
    $date = date('Y-m-d', strtotime($_POST['date']));
    $time = date('Y-d-m H:i:s', strtotime($_POST['time']));

    //Error messages
    $errors = [];

    if ($firstname == '') {
        $errors['voornaam'] = '*voer uw voornaam in';
    }
    
    if ($lastname == '') {
        $errors['achternaam'] = '*voer uw achternaam in';
    }
    
    if ($email == '') {
        $errors['email'] = '*voer uw e-mailadres in';
    }

    if ($phonenumber == '') {
        $errors['telefoon'] = '*voer uw telefoonnummer in';
    }

}

