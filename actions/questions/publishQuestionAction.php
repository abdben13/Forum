<?php

    require('../actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){

    //Vérification si les champs sont renseignés
    if(!empty($_POST['title']) AND !empty($_POST['content'])){
        
        //Les données de la question
        $question_title = htmlspecialchars($_POST['title']);
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date("d/m/Y");
        $question_id_author = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];

        //Insere la question dans la base de données
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions (titre, contenu, id_auteur, pseudo_auteur, date_publication ) VALUES (?,?,?,?,?)');
        $insertQuestionOnWebsite->execute(array($question_title, $question_content, $question_id_author, $question_pseudo_author, $question_date));
        
        $successMsg = "La question a bien été publiée";
    
    }else{
        $errorMsg = "Veuillez remplir tous les champs";
    }
}
