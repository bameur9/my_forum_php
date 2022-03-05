<?php
require('./actions/database.php');

$db = new DataLayer();


if(isset($_POST['validate'])){
    if(!empty($_POST['pseudo']) &&  !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password'])){

        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_lastname= htmlspecialchars($_POST['lastname']);
        $user_firstname= htmlspecialchars($_POST['firstname']);
        $user_password=password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

        if($db->checkIfUserAlreadyExists ($user_pseudo) == NULL){
           
          $user =array(
             "pseudo" => $user_pseudo,
             "firstname" => $user_firstname,
             "lastname" => $user_lastname,
             "password" => $user_password
          );

          $getIdThisUser = $db->addUsers($user);

          $userSessionInfos = $db -> getInfosOfThisUserReq($getIdThisUser);
       
         $alert = "success";
         $msgAlert = 'Sie haben jetzt registriert! Jetzt Anmelden';
        
        }else {
            $alert = "danger";
            $msgAlert = 'Pseudo existiert schon! Versuchen Sie erneut';
        }
    }else {
        $alert = "danger";
       $msgAlert = 'Füllen Sie die Felder aus';
    }

}


