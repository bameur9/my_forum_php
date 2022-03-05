<?php 
include('actions/users/securityAction.php');
include('actions/questions/myQuestionsAction.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<body>
    <?php include('includes/navbar.php') ?>
    <div class="container">
        <br>
        <br>
        <?php include('includes/alertMessage.php'); ?>

        <?php foreach($getQuestions as $question):  ?> 
            <div class="card text-center mb-4">
        <div class="card-header">
           <?= $question['title']; ?>
        </div>
        <div class="card-body">
            <p class="card-text"><?= $question['description']; ?>.</p>

        <a href="" class="btn btn-primary">Frage ansehen</a>
        <a href="publish_question.php?questionNr=<?=$question['id'] ?>" class="btn btn-warning">Frage bearbeiten</a>
        <a href="actions/questions/deleteQuestionAction.php?questionNr=<?=$question['id'] ?>" class="btn btn-danger">Frage löschen</a>
        </div>
        <div class="card-footer text-muted">
        Gepostet am <?= $question['date']; ?>
        </div>
        </div>

        <?php endforeach;?>
    </div>

    
</body>
</html>