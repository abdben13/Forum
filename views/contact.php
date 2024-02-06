<?php 
    session_start();
    include('../includes/head.php'); ?>

<body>
<?php include('../includes/navbar.php'); ?>
<br><br>
    
<form class="container" method="POST">
    <div class="form_contact">
    <h1>Contact</h1>
    </div>
        <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Envoyer</button>
    </form>
</body>
</html>