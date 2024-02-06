<?php 
session_start();
require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //On vérifie que tous les champs sont renseignés
    if(!empty($_POST['pseudo_email']) AND !empty($_POST['password'])){
        
        //Données de l'utilisateur
        $user_email = htmlspecialchars($_POST['pseudo_email']);
        $user_pseudo = htmlspecialchars($_POST['pseudo_email']);
        $user_password = htmlspecialchars($_POST['password']);

        //On vérifie si l'utilisateur existe 
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ? OR email = ?');
        $checkIfUserExists->execute(array($user_pseudo, $user_email));

        if($checkIfUserExists->rowCount() > 0){
            
            //Recupération des données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            //On vérifie que le mot de passe est correct
            if(password_verify($user_password, $usersInfos['mdp'])) {
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastname'] = $usersInfos['nom'];
                $_SESSION['firstname'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];
                $_SESSION['email'] = $usersInfos['email'];
                $user_id = $_SESSION['id'];

                $req = $bdd->prepare("UPDATE users SET en_ligne = 1 WHERE id = ?");
                $req->execute(array($user_id));
                //Redirection vers la page d'accueil
                header('Location: ../index.php');
            }else{
                $errorMsg = 'Mot de passe incorrect';
            }
    
        }else{
            $errorMsg = "Votre pseudo est incorrect";
        }
    }else{
    $errorMsg = "Veuillez compléter tous les champs";
    }
}
?>