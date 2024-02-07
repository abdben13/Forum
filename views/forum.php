<?php 
    session_start();
    require('../actions/questions/showAllQuestionAction.php');
    include('../includes/head.php');
?>
<body>
    <?php include('../includes/navbar.php'); ?>
    <br><br>
    <div class="container">
        <h1 class="h1">Forum</h1>
        <br>
        <form method="GET">
            <div class="form-group row justify-content-center">
                <div class="col-4">
                    <input type="search" name="search" class="form-control center-input" placeholder="mots clés">
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
                            <a href="article.php?id=<?= $question['id']; ?>" class="custom-link">
                            <?= $question['titre'];?>
                            </a>
                        </div>
                        <div class="card-body">
                        <a href="article.php?id=<?= $question['id']; ?>" class="custom-card-content">
                            <?= htmlspecialchars(substr($question['contenu'], 0, 50)); ?>... <!-- Affiche un aperçu du contenu, les 50 premiers caractères -->
                        </a>
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
    <br><br>
    <?php include "../includes/footer.php";?>
</body>
</html>