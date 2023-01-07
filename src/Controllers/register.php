<?php

//create a account *
    require("src/Models/models.php");

    if (isset($_POST["button"])){

        $gender = $_POST["genre"];
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $birth = $_POST["birth"];
        $email = $_POST["email"];
        $pseudo = $_POST["pseudo"];
        $password = $_POST["password"];
        $user = new user();
        $verif = $user->verif($email, $pseudo);
        

        if (strlen($verif) != 0) {
            $error = $verif;
        } else {
            $register = $user->register($gender, $firstName, $lastName, $pseudo, $email, $password, $birth);
            $user->image($_FILES['file']['tmp_name'],$email);
            header("Location: feed");
        }

    }

    require("src/Views/register.php");











// //create a account *
// require("src/Models/models.php");

// if (isset($_POST["button"])) {
//     $email = $_POST["email"];
//     $pseudo = $_POST["pseudo"];
//     $password = $_POST["password"];
//     $user = new user();
//     $verif = $user->verif($email, $pseudo);

//     if (strlen($verif) != 0) {
//         $error = $verif;
//     } else {
//         $register = $user->register($email, $pseudo, $password);

//         $default_image = 'src/Views/img/default.png';

//         if (isset($_FILES['file']['tmp_name']) && !empty($_FILES['file']['tmp_name'])) {
//             // Une image a été téléchargée, donc utilisez celle-ci
//             $files = $_FILES['file']['tmp_name'];
//             $user->image($files, $email);
//         } else {
//             // Aucune image n'a été téléchargée, donc utilisez l'image par défaut
//             var_dump('ok');
//             $files = $default_image;
//             $user->image($files, $email);
//         }
//         header("Location: register");
//     }
// }

// require("src/Views/register.php");