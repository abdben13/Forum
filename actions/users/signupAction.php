<?php 
session_start();
require('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //On vérifie que tous les champs sont renseignés
    if(!empty($_POST['pseudo'])  && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password'])){
        
        //Données de l'utilisateur
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname = htmlspecialchars($_POST['lastname']);
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //On vérifie si l'utilisateur existe déjà
        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        if($checkIfUserAlreadyExists->rowCount() == 0){
            //Si l'utilisateur n'existe pas, on l'enregistre dans la bdd
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, nom, prenom, mdp) VALUES (?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $user_lastname, $user_firstname, $user_password));
            
            //Récupération des données de l'utilisateur
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom =? AND prenom= ? AND pseudo = ?');
            $getInfosOfThisUserReq->execute(array($user_lastname, $user_firstname, $user_pseudo));
            $usersInfos = $getInfosOfThisUserReq->fetch();

            //Si l'utilisateur n'existe pas, on l'enregistre dans la session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastname'] = $usersInfos['nom'];
            $_SESSION['firstname'] = $usersInfos['prenom'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            //Redirection vers la page d'accueil
            header('Location: index.php');
        }else{
            $errorMsg = "L'utilisateur existe déjà";
        }
    }else{
    $errorMsg = "Veuillez compléter tous les champs";
    }
}
?>