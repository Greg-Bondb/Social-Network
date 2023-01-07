<?php

//add, see, accept, refuse friend *
    require('src/Models/models.php');

    $user = new user();
    $info = $user->getSettings();
    $friend = new friendList();
    $sug = $user->suggestions();

    if(isset($_POST["submit"])) {
        $friends = $_POST["friends"];
        $error = $friend->searchFriend($friends);
    }

    if(isset($_POST["Accepter"])) {
        $friend->responseRequest("Accepter", $_GET["id"]);
        header("Location: friends");
    }

    if(isset($_POST["Refuser"]) || isset($_POST["Supprimer"]) ) {
        $friend->responseRequest("Refuser", $_GET["id"]);
        header("Location: friends");
    }

    $list = $friend->friendListAff();
    $friendsReceive = $friend->friendsReceive();
    $friendsRequest = $friend->friendsRequest();


    require('src/Views/friends.php');