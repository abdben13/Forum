<?php 
    session_start();
    require('../actions/users/showOneUsersProfileAction.php');
?>

    <?php include('../includes/head.php'); ?>
<body>
    <?php include('../includes/navbar.php'); ?>
    <br><br>
    <div class="container">
        <?php 
            if(isset($errorMsg)){ echo $errorMsg; }

                if(isset($getHisQuestions)){
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h4><?= ucfirst(strtolower($user_pseudo)) ; ?></h4>
                            <hr>
                            <p>Inscrit depuis le : <?= date('d/m/Y', strtotime($user_inscription)); ?></p>
                            <p><?= $count ?> message(s) dans le chat</p>
                            <p><?= $countGetHisQuestions?> question(s) publiée(s)</p>
                        </div>
                    </div>
                    <br>
                    <h4>Question(s) posée(s) :</h4>
                    <?php
                        while($question = $getHisQuestions->fetch()){
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                    <a href="article.php?id=<?= $question['id']; ?>">
                                        <?= $question['titre'];?>
                                    </a>
                                    </div>
                                    <div class="card-body">
                                        <?= $question['description'];?>
                                    </div>
                                    <div class="card-footer">
                                        le <?= $question['date_publication'];?>
                                    </div>
                                </div>
                                <br>
                            <?php
                        }
                }
        ?>
    </div>
</body>
</html>