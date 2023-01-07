<?php


session_start();





$uri = explode('/', $_SERVER['REQUEST_URI']);
$reprtoire = $uri[1];
$action = $uri[2]; 


if (!isset($_SESSION['id_user'])){
    if ($reprtoire == "Social_Network" && $action == "login" || $action == "" ) {
        require('./src/Controllers/login.php');
    } elseif ($reprtoire == "Social_Network" && $action == "register" ){
        require('./src/Controllers/register.php');
    } else {
        require('src/Views/404.php');
    } 
} else {

    if (isset($_GET["page"]) && isset($_GET["id"])) {

        if ($reprtoire == "Social_Network" && $action == "feed?page=".$_GET['page']."&id=".$_GET['id']) {
            require('./src/Controllers/feed.php');
        }
        
        elseif ($reprtoire == "Social_Network" && $action == "post?page=".$_GET['page']."&id=".$_GET['id']) {
            require('./src/Controllers/post.php');
        } else{
            require('src/Views/404.php');
        }

    } elseif(isset($_GET["page"])){
        //feed avec page
        if ($reprtoire == "Social_Network" && $action == "feed?page=".$_GET['page']) {
            require('./src/Controllers/feed.php');
        } 
        //post avec page
        elseif ($reprtoire == "Social_Network" && $action == "post?page=".$_GET['page']) {
            require('./src/Controllers/post.php');
        } else{
            require('src/Views/404.php');
        }
    } elseif (isset($_GET["id"])) {
        if ($reprtoire == "Social_Network" && $action == "friends?id=".$_GET['id']) {
            require('./src/Controllers/friends.php');
        } 
        elseif ($reprtoire == "Social_Network" && $action == "reaction?id=".$_GET['id']) {
            require('./src/Controllers/reaction.php');
        }         
        elseif ($reprtoire == "Social_Network" && $action == "commentaire?id=".$_GET['id']) {
            require('./src/Controllers/comment.php');
        } else{
            require('src/Views/404.php');
        }
    }

    else {
        //login ou register redirect to feed
        if ($reprtoire == "Social_Network" && $action == "login" || $reprtoire == "Social_Network" && $action == "register" ) {
            header('Location: feed');
        } 
        //settings
        elseif ($reprtoire == "Social_Network" && $action == "settings") {
            require('./src/Controllers/settings.php');
        }
        //friends
        elseif ($reprtoire == "Social_Network" && $action == "friends") {
            require('./src/Controllers/friends.php');
        } 
        //feed sans page qui redirige
        elseif ($reprtoire == "Social_Network" && $action == "feed" || $action == "") {
            header('Location: feed?page=1');
        } 
        //post sans page qui redirige
        elseif ($reprtoire == "Social_Network" && $action == "post") {
            header('Location: post?page=1');
        } elseif ($reprtoire == "Social_Network" && $action == "createpost") {
            require('./src/Controllers/createPost.php');
        }
        else {
            require('src/Views/404.php');
        }
    }
    
}