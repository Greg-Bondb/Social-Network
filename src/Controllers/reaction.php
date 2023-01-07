<?php
require('src/Models/models.php');

$user = new user();
$info = $user->getSettings();
$react = new react();

$rows = $react->getReact($_GET['id']);

if (isset($_POST['delete'])){
    $react->deleteReact($_POST['delete']);
    header("Location: reaction?id=".$_GET['id']);
}
    
require('src/Views/reaction.php');