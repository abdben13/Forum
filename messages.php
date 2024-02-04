<?php 
    session_start();
    
    if(isset($_SESSION['user'])) {
        include "actions/database.php";
        //requete pour afficher les messages
        $req = $bdd->prepare("SELECT * FROM messages ORDER BY id_m DESC");
        $req->execute();

        if($req->rowCount() == 0){
            echo "Messagerie vide !";
        } else {
            //si oui
            while($row = $req->fetch()) {
                //si c'est vous qui avez envoyé le message on utilise ce format : 
                if($row['email'] == $_SESSION['user']){
                    ?>
                    <div class="message your_message">
                        <span>Vous</span>
                        <p><?= $row['msg'] ?></p>
                        <p class="date"><?= $row['date'] ?></p>
                    </div><!--message your_message-->
                    <?php
                } else {
                    //si vous n'êtes pas l'auteur du message, on affiche le message sous ce format :
                    ?>
                    <div class="message others_message">
                        <span><?= $row['email'] ?></span>
                        <p><?= $row['msg'] ?></p>
                        <p class="date"><?= $row['date'] ?></p>
                    </div><!--message others_message-->  
                    <?php      
                }
            }
        }
    }
    ?>