<?php
require_once("connection.php");
require_once("error.php");

// 'Post back' with the data from the form.
// $firstname = mysqli_real_escape_string($conn, $_POST['voornaam']);
// $lastname =  mysqli_real_escape_string($conn, $_POST['achternaam']);
// $email =  mysqli_real_escape_string($conn, $_POST['email']);
// $phonenumber =  mysqli_real_escape_string($conn, $_POST['telefoon']);


 if (isset($_POST['submit'])) {
     //Set form variables
     $firstname = mysqli_real_escape_string($conn, $_POST['voornaam']);
     $lastname =  mysqli_real_escape_string($conn, $_POST['achternaam']);
     $email =  mysqli_real_escape_string($conn, $_POST['email']);
     $phonenumber =  mysqli_real_escape_string($conn, $_POST['telefoon']);
     $hairstyle =  mysqli_real_escape_string($conn, $_POST['hairstyle']);
     $hairlength =  mysqli_real_escape_string($conn, $_POST['hairlength']);
     $date = date('Y-m-d', strtotime($_POST['date']));
     $time = date('H:i', strtotime($_POST['time']));
    
    // check if there are no errors
    if (empty($errors)) {
                $query = "INSERT INTO gebruikers (first_name, last_name, email, phone_number, hairstyle ,hairlength, date, time)
        VALUES('$firstname', '$lastname', '$email', '$phonenumber', '$hairstyle','$hairlength','$date', '$time')";
                $result = mysqli_query($conn, $query);

                if ($result) {
                    header("location:confirmation.php");
                }
            }
        }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&display=swap');
    </style>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Roboto&display=swap');
    </style>

    <title>Document</title>
</head>

<script>
    function gekozenStijl() {
        var mylist = document.getElementById("haarstijl");
        document.getElementById("gekozenHS").value = mylist.options[mylist.selectedIndex].text;
    }
</script>
<script>
    function gekozenLengte() {
        var mylist = document.getElementById("lengte");
        document.getElementById("gekozenL").value = mylist.options[mylist.selectedIndex].text;
    }
</script>

<body>

    <div class="bodyIndex">
        <div class="circleIndex">
            <div class="txt">
                <div class="head_txt">Daya's Hairsalon</div>
                <div class="sub_txt">Hair & Beauty</div>
            </div>
        </div>
        <div class="braids-pic"><a href="#"></a></div>


        <form method="POST" action="">
            <div id="agenda" class="shadow-6">
                <div class="ag_txt">Maak een afspraak</div>
                <div class="slide-downs">
                    <!-- HAARSTIJL -->
                    <div class="sld-dwn1">
                        
                        <select name="hairstyle" id="hairstyleId" class="hairstyle" onchange="gekozenStijl()">
                            <option>kies je stijl</option>
                            <optgroup value="boxbraids" label="Boxbraids">
                                <option value="dun-boxbraids">(dun) boxbraids</option>
                                <option value="medium-boxbraids">(medium) boxbraids</option>
                                <option value="dik-boxbraids">(dik) boxbraids</option>
                            <optgroup value="knotless-braids" label="Knotless braids">
                                <option value="dun-klbraids"> (dun) Knotless braids</option>
                                <option value="medium-klbraids"> (medium) Knotless braids</option>
                                <option value="dik-klbraids"> (dik) Knotless braids</option>
                            <optgroup value="braids" label="Braids">
                                <option value="lemonade-s"> Lemonade S</option>
                                <option value="lemonade-m"> Lemonade M</option>
                                <option value="fulani-s"> Fulani S</option>
                                <option value="fulani-m"> Fulani M</option>
                            <optgroup value="cornrows" label="Cornrows">
                                <option value="2-cornrows"> 2 Cornrows</option>
                                <option value="4-cornrows"> 4 Cornrows</option>
                                <option value="6-cornrows"> 6 Cornrows</option>
                                <option value="8-cornrows"> 8 Cornrows</option>
                                <option value="10-cornrows">10 Cornrows</option>
                                <option value="12-cornrows">12 Cornrows</option>
                                <option value="12+cornrows">12+ Cornrows</option>
                            <optgroup value="ponytail" label="Ponytail">
                                <option value="1-vlecht"> Eén vlecht</option>
                                <option value="Weave"> Weave</option>
                                <option value="braids"> Braids</option>
                            <optgroup value="men-braids" label="Men braids">
                                <option value="cornrows"> Cornrows</option>
                                <option value="boxbraids"> Boxbraids</option>
                                <option value="twist"> Twist</option>
                        </select>
                    </div>
                    <!-- HAARLENGTE -->
                    <div class="sld-dwn2">
                        <select name="hairlength" class="length" id="lengthId" onchange="gekozenLengte()">
                            <option> kies je lengte</option>
                            <option value="kort"> kort</option>
                            <option value="medium"> medium</option>
                            <option value="lang"> lang</option>
                            <option value="extra-lang"> extra lang</option>
                        </select>
                    </div>

                    <div>
                        <div class="date">
                            <input type="date" id="date" name="date">
                        </div>
                        <div class="time">
                            <input type="time" id="time" name="time">
                        </div>
                    </div>
                </div>

                <div class="form-wrap">
                    
                    <div>
                        <span class="errors"><?= $errors['voornaam'] ?? '' ?></span>
                        <input type="text" placeholder="Voornaam" name="voornaam" value="<?=isset($_POST['voornaam']) ? $_POST['voornaam'] : NULL?>" />
                    </div>
                    <div>
                        <span class="errors"><?= $errors['achternaam'] ?? '' ?></span>
                        <input type="text" placeholder="Achternaam" name="achternaam" value="<?=isset($_POST['achternaam']) ? $_POST['achternaam'] : NULL?>" />

                    </div>
                    <div>
                        <span class="errors"><?= $errors['email'] ?? '' ?></span>
                        <input type="email" placeholder="Email" name="email" value="<?=isset($_POST['email']) ? $_POST['email'] : NULL?>"/>

                    </div>
                    <div>
                        <span class="errors"><?= $errors['telefoon'] ?? '' ?></span>
                        <input type="text" placeholder="Telefoonnummer" name="telefoon"value="<?=isset($_POST['telefoon']) ? $_POST['telefoon'] : NULL?>" />
                    </div>
                    <div>
                        <button class="btn-login" name="submit">Maak Afspraak</button>
                    </div>
                
                </div>
            </div>
        </form>
    </div>
</body>


</html>