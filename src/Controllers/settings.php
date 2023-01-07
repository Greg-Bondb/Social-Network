<?php

//manage settings *
    require(__DIR__."/../Models/models.php");

    $user = new user();
    $info = $user->getSettings();
    $comptFriend = $user->settingsFriend();
    $comptPost = $user->settingsPost();
    $comptComment = $user->settingsComment();
    $comptReaction = $user->settingsReaction();

    if (isset($_POST['changeimg'])) {
        $user->changeImg($_FILES['file']['tmp_name']);
        $error = "Image changé !";
        header("Cache-Control: no-cache");
    }

    if (isset($_POST['button_mdp'])){

        $mdp = $_POST["password"];
        $mdp1 = $_POST["password1"];
        $mdp2 = $_POST["password2"];
        $verif = $user->verifPassword($mdp,$mdp1,$mdp2);

        if (strlen($verif) == 0) {
            $register = $user->changeMdp($mdp1);
            $error = "Mot de passe modifié";
        } else {
            $error = $verif;
        }
    }

    if (isset($_POST['disconnect'])) {
        $user->disconnect();
        header('Location: login');
    }

    if (isset($_POST['delete'])) {
        $user->deleteAccount();
        header('Location: login');
    }

    require(__DIR__."/../Views/settings.php");