<?php 
    require('actions/database.php');

        //Recuperation de la question "présentation"
        $getQuestionPresentation = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions WHERE id = 1');
        $getQuestionPresentationData = $getQuestionPresentation->fetch();
        
        //Recuperation de toutes les questions
        $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');
?>