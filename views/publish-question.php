<?php 
    require('../actions/users/securityAction.php'); 
    require('../actions/questions/publishQuestionAction.php');
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
?>

<?php include ("../includes/head.php"); ?>
<body>
    <?php include('../includes/navbar.php');?>
    <br>
    <br>
    <div class="container">
        <form class="container" method="POST" accept-charset="UTF-8">
            <?php 
                if(isset($errorMsg)){ 
                    echo '<p>'.$errorMsg.'</p>';
                }elseif(isset($successMsg)){ 
                    echo '<p>'.$successMsg.'</p>';
                }
                ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Contenu</label>
                <textarea class="form-control" name="content"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>
        </form>
    </div><!--container -->
    <br><br>
    <?php include "../includes/footer.php";?>
</body>
</html>