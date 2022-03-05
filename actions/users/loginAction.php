<?php
require('./actions/database.php');

$bd = new DataLayer();

if(isset($_POST['validate'])){
    if(!empty($_POST['pseudo']) && !empty($_POST['password'])){
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
       
        $user_password=htmlspecialchars($_POST['password']);

        $checkIfUserExists =$bd-> checkIfUserAlreadyExists ( $user_pseudo);

       if(isset($checkIfUserExists['pseudo'] )){
          
         if(password_verify($user_password, $checkIfUserExists['password'])){
            
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $checkIfUserExists['id'];
            $_SESSION['lastname'] = $checkIfUserExists['lastname'];
            $_SESSION['firstname'] =$checkIfUserExists['firstname'];
            $_SESSION['pseudo'] = $checkIfUserExists['pseudo'];
            header('Location: index.php');
           
         }else{
            $alert = "danger";
            $msgAlert = 'pseudo oder passwort falsch!';
         }

       }
       
    }
}





?>