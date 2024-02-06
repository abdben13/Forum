<?php require('../actions/users/signupAction.php'); ?>

<?php include '../includes/head.php';?>
<body>
    <?php include '../includes/navbar.php';?>
    <br>
    <br>
    <div class="container">
        <form class="container" method="POST">
            <?php 
                if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>';} 
                if(isset($msgSuccess)){ echo '<p>'.$msgSuccess.'</p>';} ?>
            <div class="mb-3">
                <label class="form-label">Pseudo</label>
                <input type="text" class="form-control" name="pseudo">
            </div>
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" class="form-control" name="lastname">
            </div>
            <div class="mb-3">
                <label class="form-label">Prénom</label>
                <input type="text" class="form-control" name="firstname">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>
            <br><br>
            <a href="login.php"><p>J'ai deja un compte, je me connecte</p></a>
        </form>
    </div><!--container -->
</body>
</html>