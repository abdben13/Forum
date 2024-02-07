<?php
require('../actions/users/resetPasswordAction.php');
include('../includes/head.php');
?>

<body>
    <?php include('../includes/navbar.php'); ?>
    <br>
    <br>
    <div class="container">
        <form class="container" method="POST">
            <?php if (isset($errorMsg)) { ?>
                <p><?php echo $errorMsg; ?></p>
            <?php } ?>
            <?php if (isset($msgSuccess)) { ?>
                <p><?php echo $msgSuccess; ?></p>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Réinitialiser le mot de passe</button>
            <br><br>
            <a href="login.php"><p>Retour à la page de connexion</p></a>
        </form>
    </div><!--container-->
    <br><br>
    <?php include "../includes/footer.php"; ?>
</body>

</html>
