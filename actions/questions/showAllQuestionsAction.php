<?php
require('actions/database.php');
$bd = new datalayer();
$usersSearch ="";
$showAllQuestion =[];
$mySession =false;
$mySessionId = $_SESSION['id'];


if(isset($_GET['search']) && !empty($_GET['search'])){
    $usersSearch = $_GET['search'];
    $showAllQuestion = $bd->readAndSearchAllQuestions($usersSearch );
}else {
    $showAllQuestion = $bd->readAndSearchAllQuestions($usersSearch );  
}

?>