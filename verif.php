<?php
include "connexion.php" ;
if(isset($_POST['envoyer'])){
    $email=$_POST['email'];
    $mdp=$_POST['mdp'];
    $l=$conn->query("SELECT * FROM `utilisateur` WHERE Email = '$email' AND mdp = '$mdp'")->fetchAll();
    if(!empty($l)){
       header("location:mainpage.php");
    }
    else{
       echo "il ya aucun utilisateur avec ce nom et mot de passe";
    }
}
?>