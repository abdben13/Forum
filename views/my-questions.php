<?php 
    require('../actions/users/securityAction.php'); 
    require('../actions/questions/myQuestionsAction.php');
     
?>

<?php include('../includes/head.php');?>
<body>
    <?php include('../includes/navbar.php');?>
    <br><br>
    <div class="container">
        <?php 
            while($question = $getAllMyQuestions->fetch()){
            ?>
            <div class="card">
                <h5 class="card-header">
                    <a href="article.php?id=<?= $question['id']; ?>" class="custom-link">
                        <?= $question['titre'];?>
                    </a>
                </h5>
                <div class="card-body">
                    <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Acceder à la question</a>
                    <a href="edit-question.php?id=<?= $question['id'] ?>" class="btn btn-warning">Modifier la question</a>
                    <a href="../actions/questions/deleteQuestionAction.php?id=<?= $question['id'] ?>" class="btn btn-danger">Supprimer la question</a>
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