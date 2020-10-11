<?php

require_once 'connect.php';

session_start();


if(isset($_POST['username']) && isset($_POST['password']))
{
    
    
      
    //On récupère les deux variables du form
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    
    if($username !== "" && $password !== "")
    {

      echo 'TOTO';
      try{
         //requête SQL avec le user et le mot de passe
         $requete = "SELECT count(*) FROM Users where 
         prenom = '".$username."' and password = '".$password."' ";
         $sth=$dbh->prepare($requete);
         $sth->execute();
         $response= $sth->fetchAll();

         $count =  $response[0]["count(*)"];
      }catch (Exception $e){
         echo '<pre>';
         var_dump($e);
      }
      echo 'TOTO';
      
         
      if($count!=0) // nom d'utilisateur et mot de passe correctes
      {
         $_SESSION['username'] = $username;
         header('Location: index.php');
      }
      else
      {
         header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}
// mysqli_close($db); // fermer la connexion
?>