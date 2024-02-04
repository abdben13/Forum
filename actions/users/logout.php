<?php 
session_start();
require('../database.php');

if (isset($_SESSION['pseudo'])) {
    $user_pseudo = $_SESSION['pseudo'];

    $req = $bdd->prepare("UPDATE users SET en_ligne = 0 WHERE pseudo = '$user_pseudo'");
    $req->execute();

    session_destroy();
    header('Location: ../../index.php');
}
?>