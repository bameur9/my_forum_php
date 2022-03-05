<?php
require('./actions/database.php');

$bd = new DataLayer();
$user =[];

if(isset($_GET['userNr']) && !empty($_GET['userNr'])){
    $showUserId =$_GET['userNr'];

    if($bd-> getInfosOfThisUserReq( $showUserId) !== NULL){
        $user = $bd -> getInfosOfThisUserReq( $showUserId);
      
        $lastname =$user['lastname'];
        $firstname =$user['firstname'];
        $pseudo = $user['pseudo'];

        $allQuestions =$bd->getAllQuestions( $showUserId);

    }else {
        $alert = "danger";
        $msgAlert = 'User existiert nicht!';
    }

}else {
    $alert = "danger";
    $msgAlert = 'User existiert nicht!';
}