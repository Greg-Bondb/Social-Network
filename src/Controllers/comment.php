<?php

    require('src/Models/models.php');

    $comment = new comment();
    $user = new user();
    $info = $user->getSettings();

    $commentList = $comment->getComments($_GET['id']);

    if (isset($_POST['send'])) {
        $idpost = $_GET['id'];
        $message = $_POST['comment'];
        $comment->createComment($idpost,$message);
        header("Location: commentaire?id=".$_GET['id']);
    }

    if (isset($_POST['delete'])) {
        $comment->deleteComment($_POST['delete']);
        header("Location: commentaire?id=".$_GET['id']);
    }

    require('src/Views/comment.php');