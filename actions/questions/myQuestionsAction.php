<?php
require('./actions/database.php');

$bd = new DataLayer();
$id_author =$_SESSION['id'];

$getQuestions = $bd-> getAllQuestions( $id_author);


?>