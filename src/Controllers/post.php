<?php

//see all posts *
    require('src/Models/models.php');

        $user = new user();
        $arraypost = new post();
        $comment = new comment ();
        $react = new react();

        $info = $user->getSettings();


        if (isset($_POST['delete'])){
            $post = new post();
            $post->deletePost($_GET['id']);
        
            header('Location: post');
        }

        if (isset($_POST['send'])) {
            $idpost = $_GET['id'];
            $message = $_POST['comment'];
            var_dump($idpost,$message);
            $comment->createComment($idpost,$message);
            header("Location: post");
        }

        if (isset($_POST['ok'])) {
            $idpost = $_GET['id'];
            $message = $_POST['ok'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: post");
        }
    
        if (isset($_POST['no'])) {
            $idpost = $_GET['id'];
            $message = $_POST['no'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: post");
        }
    
        if (isset($_POST['laught'])) {
            $idpost = $_GET['id'];
            $message = $_POST['laught'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: post");
        }
    
        if (isset($_POST['hearth'])) {
            $idpost = $_GET['id'];
            $message = $_POST['hearth'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: post");
        }
    
        if (isset($_POST['sorry'])) {
            $idpost = $_GET['id'];
            $message = $_POST['sorry'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: post");
        }

        $page = $_GET['page'];
        $nbelem = 10;

        $nbfeed = $arraypost->countPost();
        $nbfeed = (int) $nbfeed['COUNT(*)'];
        $nbpage = ceil($nbfeed/$nbelem);

        if(empty($page) || $page > $nbpage || !is_numeric($page)) {
            header("Location: post?page=1");
        }

        $debut = ($page-1)*$nbelem;

        $rows = $arraypost->affichage($debut, $nbelem);
        
    require('src/Views/posts.php');