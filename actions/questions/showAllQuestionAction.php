<?php 
    require('../actions/database.php');

        //Recuperation de toutes les questions
        $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

        //Verifie si une recherche a été rentrée par l'utilisateur
        if(isset($_GET['search']) AND !empty($_GET['search'])) {

            //La recherche
            $usersSearch = $_GET['search'];

            //Récuperation de toutes les questions correspondant à la recherche (en fonction du titre)
            $getAllQuestions = $bdd->query('SELECT id, id_auteur, titre, description, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%'.$usersSearch.'%" ORDER BY id DESC');

        }
?>