<?php 
    session_start();
    require('actions/questions/showAllQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include ("includes/head.php");?>
<body>
    <?php include('includes/navbar.php');?>
    <div class="title">
        <h1>Dans ma bulle</h1>
        <img src="images/bulle.png" alt="bulle" class="img">
    </div>
    <div class="presentation">
        <p>Un espace dédié à l'autisme. Nous sommes ici pour partager, informer et soutenir. Explorez nos ressources, échangez des expériences et découvrez une communauté bienveillante prête à accompagner chacun dans son parcours unique. Ensemble, nous cultivons la compréhension et la sensibilisation à l'autisme.</p>
    </div>
    <br><br>
    <div class="container">
        <form method="GET">
            <div class="form-group row">
                <div class="col-8">
                    <input type="search" name="search" class="form-control">
                </div>
                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>
            </div>
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
                </div>
                <br>
            <?php
        }
    ?>

    </div>
</body>
</html>