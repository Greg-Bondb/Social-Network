<?php

//create a post *
    require('src/Models/models.php');

    $user = new user();
    $info = $user->getSettings();

    if(isset($_POST['boutton'])){
        $adds = new post();
        $message = $_POST['message'];

        if (strlen($message) >2 && strlen($message) < 400) {
            $envoi = $adds->createPost($message);
    
            header('Location: post');
        } else {
            $error = "Votre message doit contenir entre 2 et 400 caractÃ¨res !";
        }
    }
    
    require('src/Views/createPost.php');