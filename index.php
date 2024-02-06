<?php 
    session_start();
    require('actions/questions/showAllQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="manifest" href="manifest.json">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Forum</title>
    <link rel="icon" href="images/bulle.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Dans ma bulle</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Les questions</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/publish-question.php">Publier une question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/chat.php">Chat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/contact.php">Contact</a>
        </li>
        <?php if(isset($_SESSION['auth'])) {
          ?>
          <li class="nav-item">
          <a class="nav-link" href="views/profile.php?id=<?= $_SESSION['id']; ?>">Mon profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="views/my-questions.php">Mes questions</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" href="actions/users/logout.php">Déconnexion</a>
        </li>
          <?php 
        }else{
          ?>
          <li class="nav-item">
          <a class="nav-link" href="views/login.php">Se connecter</a>
        </li>
        <?php
        }
        ?>
        </ul>
    </div>
  </div>
</nav>
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
                        <a href="views/article.php?id=<?= $question['id']; ?>">
                        <?= $question['titre'];?>
                        </a>
                    </div>
                    <div class="card-body">
                    <?= $question['description'];?>
                    </div>
                    <div class="card-footer">
                    Publié par <a href="views/profile.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur'];?></a> le <?= $question['date_publication']; ?>
                    </div>
                </div><!--card -->
                <br>
            <?php
        }
    ?>

    </div>
</body>
</html>