<?php
require("src/Models/models.php");

//login to your account *
if (isset($_POST['submit'])){

    $email = $_POST["email"];
    $password = $_POST["password"];
    $pseudo = $email;
    $user = new user();
    $log = $user->login($email,$pseudo,$password);

    if ($log) {
        header('Location: feed');
    } else {
        $error = "Echec de l'authentification, l'email ou le mot de passe invalide !";
    }
}

require('src/Views/login.php');
