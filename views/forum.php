<?php 
    session_start();
    require('../actions/questions/showAllQuestionAction.php');
    include('../includes/head.php');
?>
<body>
    <?php include('../includes/navbar.php'); ?>
    <br><br>
    <div class="container">
        <h1>Forum</h1>
        <br>
        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>
            </div><!--form-group-->
        </form>
        <br>
        <?php 
            while($question = $getAllQuestions->fetch()){
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
                        Publié par <a href="profile.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur'];?></a> le <?= $question['date_publication']; ?>
                        </div>
                    </div><!--card -->
                    <br>
                <?php
            }
        ?>
    </div><!--container -->
</body>