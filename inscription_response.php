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

      try{

         $requete="INSERT INTO Users (nom,prenom,username,password,age) VALUES (:nom,:prenom,:username,:mdp,:age);";
         $sth=$dbh->prepare($requete);
         $sth->execute(array(':nom' => $nom, ':prenom' => $prenom, ':username' => $username, ':mdp' => md5($password), ':age' => $age));
        

      }catch (Exception $e){
         echo '<pre>';
         var_dump($e);
      }

      header('Location: index.php?page=login'); // connexion reussi     
      
    }
    else
    {
       header('Location: index.php?page=inscription&erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php?page=inscription');
}

?>