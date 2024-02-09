<?php 
session_start();
require('../database.php');

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $req = $bdd->prepare("UPDATE users SET en_ligne = 0 WHERE id = '$user_id'");
    $req->execute();

    session_destroy();
    header('Location: ../../index.php');
}else{
    header('Location: ../../index.php');
}
?>