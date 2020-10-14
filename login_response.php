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

     
      try{
         //requête SQL avec le user et le mot de passe
         // $requete = "SELECT count(*) FROM Users where 
         // username = '".$username."' and password = '".$password."' ";
         // $sth=$dbh->prepare($requete);
         // $sth->execute();
         // $response= $sth->fetchAll();

         // $count =  $response[0]["count(*)"];
         $requete = "SELECT * FROM Users where 
         username = '".$username."' and password = '".$password."' ";
         $sth=$dbh->prepare($requete);
         $sth->execute();
         $response= $sth->fetchAll();



      }catch (Exception $e){
         echo '<pre>';
         var_dump($e);
      }

     

     
      
      if($response[0]!=null) // nom d'utilisateur et mot de passe correctes
      {
         //Une ligne est trouvée, on récupère les données de l'utilisateur
         $_SESSION['idUser'] = $response[0]["idUser"];
         $_SESSION['nom'] =$response[0]["nom"];
         $_SESSION['prenom'] =$response[0]["prenom"];
         $_SESSION['age'] =$response[0]["username"];
         $_SESSION['username'] = $username;

         header('Location: index.php');
   
      }
      else
      {
         header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
      }
      
         
      // if($count!=0) // nom d'utilisateur et mot de passe correctes
      // {
      //    $_SESSION['username'] = $username;
      //    header('Location: index.php');
      // }
      // else
      // {
      //    header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
      // }
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