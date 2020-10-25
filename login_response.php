<?php

require_once 'database/connect.php';

session_start();


if(isset($_POST['username']) && isset($_POST['password']))
{
    

    //On récupère les deux variables du form
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    
    if($username !== "" && $password !== "")
    {

     
      try{

         $requete = "SELECT * FROM Users where username = :username and password = :mdp ";
         $sth=$dbh->prepare($requete);
         $sth->execute(array(':username' => $username, ':mdp' => md5($password)));
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

         header('Location: index.php?page=accueil');
   
      }
      else
      {
         header('Location: index.php?page=login&erreur=1'); // utilisateur ou mot de passe incorrect
      }
    }
    else
    {
       header('Location: index.php?page=login&erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php?page=login');
}
// mysqli_close($db); // fermer la connexion
?>