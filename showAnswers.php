<?php foreach($showAllAnswers as $answer){ ?>
<div class="card m-3">

  <div class="card-header">
  Antwort von <b><?=($answer['pseudo_author'] ===$_SESSION['pseudo'])? 'mir' : $answer['pseudo_author'];?> </b>
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><?= $answer['content']; ?></p>
      <footer class="blockquote-footer">gepostet am <?= $answer['date']; ?></footer>
    </blockquote>
  </div>
</div>

<?php } ?>