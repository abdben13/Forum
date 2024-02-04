<?php 
   require('actions/users/securityAction.php'); 

    $pseudo = $_SESSION['pseudo'];
    include "includes/head.php";
    include "includes/navbar.php";
    include "actions/database.php";
?>
<br><br>
<?php
   $reqUsers = $bdd->prepare("SELECT * FROM users");
   $reqUsers->execute();
   $users = $reqUsers->fetchAll();
   
    if(isset($_POST['send'])) {
        // Récupérons le message 
        $message = $_POST['message'];

        include "actions/database.php";
        
        // Vérifions si le champ n'est pas vide
        if(isset($message) && $message != "") {
            // Insérer le message dans la base de données
            $req = $bdd->prepare("INSERT INTO messages VALUES (NULL,'$pseudo','$message',NOW())");
            $req->execute();
    
            // Actualisation de la page 
            header('Location:chat.php');
        } else {
            // Si le message est vide, on actualise la page 
            header('Location:chat.php');
        }
    }
    ?>
   
   <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="users">
                    <table class="table table-striped">
                        <caption>Utilisateurs</caption>
                        <tbody>
                            <?php foreach ($users as $user): ?>
                                <?php
                                    
                                    $iconeEnLigne = ($user['en_ligne'] == 1) ? '<img class="icone-ligne" src="images/pngegg.png" alt="En ligne">' : '';
                                    $iconeHorsLigne = ($user['en_ligne'] == 0) ? '<img class="icone-ligne" src="images/pngrouge.png" alt="Hors ligne">' : '';
                                ?>
                                <tr>
                                <td class="icone-ligne">
                                    <?= ucfirst(strtolower($user['pseudo'])) ?>
                                    <?= $iconeEnLigne ?>
                                    <?= $iconeHorsLigne ?>
                                </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div><!--users-->
            </div><!--col-md-4-->

            <div class="col-md-6">
                <div class="chat">
                    <div class="pseudo">
                        <span><?= strtoupper($pseudo) ?></span>
                        <a href="actions/users/logout.php" class="btn btn-danger">Déconnexion</a>
                    </div>
                    
                    <div class="messages_box">Chargement ...</div>
                    
                    <form action="" class="send_message" method="POST">
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="2" placeholder="Votre message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="send">Envoyer</button>
                    </form>
                </div><!--chat-->
            </div><!--col-md-6-->
        </div><!--row-->
    </div><!--container-->
    <script> 
        //actualisation de la page en utilisant AJAX
        var message_box = document.querySelector('.messages_box');
        setInterval(function(){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    message_box.innerHTML = this.responseText
                }
            };
            xhttp.open("GET","messages.php", true); //recuperation de la page message
            xhttp.send()
        },500) //actualisation du chat toutes les 500 ms
    </script>
</body>
</html>