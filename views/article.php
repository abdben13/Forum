<?php 
    session_start();
    require('../actions/questions/showArticleContentAction.php');
    require('../actions/questions/postAnswerAction.php');
    require('../actions/questions/showAllAnswersOfQuestionAction.php');
    ?>
    <?php include '../includes/head.php'; ?>
<body>
    <?php include('../includes/navbar.php');?>
    <br><br>

    <div class="container">

        <?php 
        if(isset($errorMsg)){ echo $errorMsg;}
            if(isset($question_publication_date)){
              ?>
            <section class="show-content">
                <h3><?= $question_title; ?> </h3>
                <hr>
                <p><?= $question_content; ?></p>
                <hr>
                <small>Par <?= '<a href="profile.php?id='.$question_id_author.'">'. $question_pseudo_author. '</a> ' . "le " .$question_publication_date ?></small>
            </section><!--show-content -->
            <br>
            <section class="show-answers">
                <?php 
                    while($answer = $getAllAnswersOfThisQuestion->fetch()) {
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="profile.php?id=<?= $answer['id_auteur']; ?>">
                                <?= $answer['pseudo_auteur'];?></a>
                            </div>
                            <div class="card-body">
                                <?= $answer['contenu'];?>
                            </div>
                            <div class="card-footer">
                                <small>le <?= date('d/m/Y', strtotime($answer['date_answer'])); ?></small>
                            </div>
                        </div>
                        <br>
                        <?php 
                    }
                ?>
                 <form class="form-group" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Réponse :</label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                        </div><!--form-group -->
                </form>
            </section><!--show-answers -->
            <?php
            }
        ?>    
    </div><!--container -->
    <footer class="bg-body-tertiary text-center fixed-bottom footer-custom">
  <p>© By Abdelaziz 2024</p>
</footer>
</body>
</html>