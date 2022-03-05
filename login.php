<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); 
include('actions/users/loginAction.php')?>
<body>
<?php  include('includes/navbar.php'); ?>
<div class="container">
  <br>
  <br>

  <?php include('includes/alertMessage.php'); ?>

  <form method="post">
      
  <div class="mb-3">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name ="password" required>
    </div>
  
    <button type="submit" class="btn btn-primary" name="validate">Anmelden</button>
    </form>
    <br>
    <p>Neu hier? <a href="signup.php">Hier geht'es zur Registrierung.</a></p>

  </div>
    

    
</body>
</html>