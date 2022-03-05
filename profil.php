<?php
 include('actions/users/securityAction.php');
 include('actions/users/profilUserAction.php')
?>
<!DOCTYPE html>
<html lang="en">
<?php include('includes/head.php'); ?>
<body>
    <?php include('includes/navbar.php'); ?>
    <div class="container">
    <br><br>
    <?php include('includes/alertMessage.php'); ?>
            <div class="row">
                <div class="text-center col-5 card-box">
                    <div class="member-card pt-2 pb-2">
                        <div class="thumb-lg member-thumb mx-auto"><img src="https://bootdey.com/img/Content/avatar/avatar<?=rand(1,6)?>.png" class="rounded-circle img-thumbnail" alt="profile-image"></div>
                        <div class="">
                            <h4><?= $firstname ?>  <?=$lastname?></h4>
                           
                        </div>
                    </div>

                </div>

                <div class="col-10">
                        <?php foreach($allQuestions as $question){ ?>
                            <div class="card m-5">
                                <h5 class="card-header"><?=$question['title']?></h5>
                                <div class="card-body">
                                    <h5 class="card-title"><?=$question['description']?></h5>
                                    <p class="card-text"><?=$question['content']?>.</p>
                                </div>
                                <div class="card-footer text-muted">
                                    <?=$question['date']?>
                                </div>
                            </div>

                       <?php }?>

                    </div>
            </div>



    </div>


</body>
</html>