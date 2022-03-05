<?php
 include_once('actions/users/securityAction.php');
 include_once('actions/questions/publishOrEdit_questionAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<?php
 include_once('includes/head.php');
 ?>
<body>
    <?php  include_once('includes/navbar.php'); ?>
 <div class="container">
     <br>
     <br>
     <?php include('includes/alertMessage.php'); ?>

  <form method="post">
      
  <div class="mb-3">
        <label for="title" class="form-label">Titel der Frage</label>
        <input type="text" class="form-control" id="title" name="title" value ="<?= ($edit)? $values['title']:'' ?>" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Beschreibung der Frage</label>
        <textarea type="text" rows="5" class="form-control" id="description" name="description" required> <?= ($edit)? $values['description']:'' ?></textarea>
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Inhalt</label>
        <textarea class="form-control" id="content" rows="10" name="content" required> <?= ($edit)? $values['content']:'' ?></textarea>
    </div>
  
    <button type="submit" class="btn btn-primary" name="validate"><?= ($edit)? 'Bearbeiten':'Hinzufügen' ?></button>
    </form>


  </div>

  </div>
    
    
</body>
</html>