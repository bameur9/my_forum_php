<?php
 include("actions/users/securityAction.php");
 include('actions/questions/showAllQuestionsAction.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php  include('includes/head.php'); ?>      
<body>
    <?php  include('includes/navbar.php'); ?>
    <div class="container">
        <br>
        <br>
        <?php include('includes/alertMessage.php'); ?>

    <form  method="get" action="">
        <div class="row">
            
            <div class="col-8">
            <input class="form-control"  name="search" placeholder="Type to search...">
            </div>
            <div class="col-4">
            <button class="btn btn-success" type="submit" class="form-label">Suche</button>
            </div>
        </div>
     </form>
     <br>
     <br>
     <?php foreach($showAllQuestion as $question){
        if($question['id_author'] == $mySessionId){
           $mySession =true;
           $question['pseudo_author'] = 'ich';
        }else $mySession =false;?> 

      <div class="card text-center mb-4">
        
        <div class="card-header p-2">
          <h3> <?= $question['title']; ?></h3>
        </div>

        <div class="card-body">
        <div style="text-align: start; font-size:19px;">
        <a href="profil.php?userNr=<?=$question['id_author'] ?>"> <b>Profil</b> </a>
        </div>

        <div class="rounded-circle text-white bg-dark text-center pt-4" style="width: 100px; height:100px; font-size:25px;" >
            <p><?=  $question['pseudo_author'];  ?></p>
        </div>
        <p class="card-text"><?= $question['description']; ?>.</p>
        <a href="showContent.php?questionNr=<?=$question['id'] ?>" class="btn btn-primary">Frage ansehen</a>
         
        <?php
        
        if($mySession){ ?>
        <a href="publish_question.php?questionNr=<?=$question['id'] ?>" class="btn btn-warning" >Frage bearbeiten</a>

        <a href="actions/questions/deleteQuestionAction.php?questionNr=<?=$question['id'] ?>" class="btn btn-danger">Frage löschen</a>
        <?php }?>

        </div>
        <div class="card-footer text-muted">
        veröffentlicht von <?= $question['pseudo_author']; ?>
        am <?= $question['date']; ?>
        </div>
        </div>

        <?php }?>
    </div>
    
</body>
</html>