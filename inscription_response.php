<?php

require_once 'connect.php';

session_start();


if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age'])&& isset($_POST['username'])&& isset($_POST['password']))
{
    
    
   
    //On récupère les variables du form
    $nom = $_POST['nom']; 
    $prenom = $_POST['prenom']; 
    $age = $_POST['age']; 
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    
    if($nom !== "" && $prenom !== "")
    {

      echo 'HELLO';
      try{
         //requête SQL avec le user et le mot de passe
         // $requete = "SELECT count(*) FROM Users where 
         // prenom = '".$username."' and password = '".$password."' ";

         $requete="INSERT INTO Users (nom,prenom,username,password,age) VALUES ('".$nom."','".$prenom."','".$username."','".md5($password)."',$age);";
         $sth=$dbh->prepare($requete);
         $sth->execute();
         echo 'HELLO';

      }catch (Exception $e){
         echo '<pre>';
         var_dump($e);
      }

      header('Location: inscription.php?info=1'); // utilisateur ou mot de passe vide      
      
    }
    else
    {
       header('Location: inscription.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: inscription.php');
}
// mysqli_close($db); // fermer la connexion
?>