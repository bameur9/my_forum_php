<?php
include('actions/users/securityAction.php');
include('actions/questions/showQuestionContentAction.php');
include('actions/answers/postAnswerAction.php');
include('actions/answers/showAllAnswersAction.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php');  ?>
<body>
    <?php include('includes/navbar.php');  ?>
    <br><br>

    <div class="container">

    <?php include('includes/alertMessage.php'); ?>

       <?php if($questionExist){ ?>

        <div class="row">
            <div class="rounded-circle text-white bg-dark text-center pt-4 col-4" style="width: 100px; height:100px; font-size:25px;" >
                 <p><?= $question_pseudo_Author; ?></p>
            </div>
            <div class="position-right mr-5 col-6 text-center">
               <h3><?=$question_titel?></h3>
               <b><?= $question_description ?></b>

               <br><br>

               <p><?= $question_Content ?></p>

              <?php if($session !==  $question_id_Author ) {?>
                   veröffentlicht von <?=  $question_pseudo_Author; ?>
                   am <?=  $question_date; ?>
              <?php } ?>

                <br><br>

                <form class="form-group" method="post" action="">
                    <div class="row">
                  <div class="col-8">
                     <textarea rows="4"  class="form-control"  cols="40" name="commentar" placeholder="Anworten..." required></textarea>
                  </div>
                  <div class="col-4 mr-5">
                  <button class="btn btn-success" name ="validate">Antworten</button>
                  </div>
              </div>
              </form>
            </div>
        </div>
        <!--Answers-->
        <?php
        include('showAnswers.php');
    
    } ?>
    </div>
    
</body>
</html>