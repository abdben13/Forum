<?php 
session_start();
require('../database.php');

$redirect_url = "../../index.php";

if (isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];

    $req = $bdd->prepare("UPDATE users SET en_ligne = 0 WHERE id = '$user_id'");
    $req->execute();

    session_destroy();
    if(isset($_SESSION['redirect_url'])) {
        //Vers l'URL stockée
        $redirect_url = $_SESSION['redirect_url'];
        // Supprime l'URL stockée dans la session
        unset($_SESSION['redirect_url']); 
        header("Location: $redirect_url");
    } else {
        //Vers la page d'accueil par défaut
        header("Location: ../../index.php");
    }
}else{
    header("Location: $redirect_url");
}
?>