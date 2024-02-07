<?php require('../actions/users/loginAction.php'); ?>

<?php include('../includes/head.php');?>
<body>
<?php include('../includes/navbar.php');?>
    <br>
    <br>
    <div class="container">
        <form class="container" method="POST">
            <?php 
                if(isset($errorMsg)){ echo '<p>'.$errorMsg.'</p>';} ?>
            <div class="mb-3">
                <label class="form-label">Pseudo ou email</label>
                <input type="text" class="form-control" name="pseudo_email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>
            <br><br>
            <a href="signup.php"><p>Je n'ai pas de compte, je m'inscris</p></a>
        </form>
    </div><!--container-->
    <br><br>
    <?php include "../includes/footer.php";?>
</body>
</html>