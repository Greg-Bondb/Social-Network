<?php

//see post friends *
    require('src/Models/models.php');

        $user = new user();
        $arraypost = new post();
        $comment = new comment ();
        $react = new react();

        $info = $user->getSettings();

        if (isset($_POST['send'])) {
            $idpost = $_GET['id'];
            $message = $_POST['comment'];
            $comment->createComment($idpost,$message);
            header("Location: feed");
        }

        if (isset($_POST['ok'])) {
            $idpost = $_GET['id'];
            $message = $_POST['ok'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: feed");
        }
    
        if (isset($_POST['no'])) {
            $idpost = $_GET['id'];
            $message = $_POST['no'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: feed");
        }
    
        if (isset($_POST['laught'])) {
            $idpost = $_GET['id'];
            $message = $_POST['laught'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: feed");
        }
    
        if (isset($_POST['hearth'])) {
            $idpost = $_GET['id'];
            $message = $_POST['hearth'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: feed");
        }
    
        if (isset($_POST['sorry'])) {
            $idpost = $_GET['id'];
            $message = $_POST['sorry'];
            var_dump($idpost,$message);
            $react->createReact($idpost,$message);
            header("Location: feed");
        }

        $page = $_GET['page'];
        $nbelem = 10;

        $nbfeed = $arraypost->countFeed();
        $nbfeed = (int) $nbfeed['COUNT(*)'];
        $nbpage = ceil($nbfeed/$nbelem);

        if(empty($page) || $page > $nbpage && $nbfeed !=0 || !is_numeric($page)) {
            header("Location: feed?page=1");
        }

        $debut = ($page-1)*$nbelem;

        $rows = $arraypost->feed($debut, $nbelem);

    require('src/Views/feed.php');