<?php
//initialisation des paramètres du site
require_once('./config.php');
require_once('./install.php');



//vérification de la page
//vérification de la page demandée 
if(isset($_GET['page']))
{
  $page = htmlspecialchars($_GET['page']);

  if(!is_file("./".$_GET['page'].".php"))
  { 
    $page = 'erreur'; //page demandée inexistante
  }
}
else
  $page='accueil'; //page de connexion du site - http://.../accueil.php


//appel de la page
require_once("./".$page.'.php'); 

?>