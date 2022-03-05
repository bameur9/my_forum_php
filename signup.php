<!DOCTYPE html>
<html lang="en">

<?php include ('includes/head.php');
include ('actions/users/signupAction.php');
?>

<body>

<?php  include_once('includes/navbar.php'); ?>
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
        <label for="firstname" class="form-label">Vorname</label>
        <input type="text" class="form-control" id="firstname" name="firstname" required>
    </div>

    <div class="mb-3">
        <label for="lastname" class="form-label">Nachname</label>
        <input type="text" class="form-control" id="lastname" name="lastname" required>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name ="password" required>
    </div>
  
    <button type="submit" class="btn btn-primary" name="validate">Jetzt Registrieren</button>
    </form>
    <br>
    <p>Schon registrier? <a href="login.php">Hier geht'es zur Anmeldung.</a></p>

  </div>
    
    
    
</body>
</html>