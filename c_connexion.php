<?php

$bdd = new PDO('mysql:host='.BD_HOST.'; dbname='.BD_DBNAME.'; charset=utf8', BD_USER, BD_PWD);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req=$bdd->prepare('SELECT Login, MotDePasse FROM Utilisateur WHERE Login = :login');

$req->execute(array (':login' => $_POST['login']));

$resultat = $req->fetch();

//on vérifie que les champs soient remplis
if ( isset ($_POST['login']) && isset ($_POST['pswd']) )
{
	if($_POST['login'] === $resultat['Login'] && $_POST['pswd'] === $resultat['MotDePasse'])
	{
		session_start();
		
		$page='accueil';
		require_once(PATH_CONTROLLERS.$page.'.php');

		$_SESSION['login'] = $resultat['Login'];
		$_SESSION['pswd'] = $resultat['MotDePasse'];
	}
	else
	{
		echo 'Mauvais identifiant ou Mot de passe incorrect !';
	}
}
//mot de passe en sha1 : 8cb2237d0679ca88db6464eac60da96345513964







if(isset($erreur)) 
{
	header('Location: index.php?message='.$erreur);
	exit();
}
else
{  	
	       
	require_once(PATH_VIEWS.'connexion.php');
}

?>