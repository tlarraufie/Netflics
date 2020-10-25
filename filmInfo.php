 <!-- tester si l'utilisateur est connecté -->
 <?php
    session_start();
    if(isset($_GET['deconnexion']))
    { 
        if($_GET['deconnexion']==true)
        {  
            session_unset();
            $flag=false;
            header("location:index.php");
        }
    }else if($_SESSION['username'] !== ""){
        $user = $_SESSION['username'];
        $flag=true;
    }

    $idFilm = $_GET['x'];

?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflics</title>
    <link href="styles/main.css" rel="stylesheet">
    <link href="styles/info.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- HEADER and LeftBar SECTION-->

    <?php include_once 'components/header.php'; ?>

    <?php include_once 'components/leftBar.php'; ?>

     <!-- END HEADER and LeftBar SECTION-->
    
<main id="main"> 
    <!-- START SECTION -->

    <!-- INFO CONTENT -->
    <div class="content">
        
        <img id=<?php echo $idFilm ?> src="" alt="">
        
        
        <div class="content-info">
            <h1 id="titre"></h1>
            <hr>
            <p id="auteur"></p>
            <p id="distributeur"></p>
            <p id="duree"></p>
            <p id="date"></p>

            <a href="index.php"><button class="btn-retour">RETOUR</button></a>
        </div> 
    </div>

    <!-- END SECTION -->
</main>

<script src="https://kit.fontawesome.com/yourcode.js"></script>
<script type="text/javascript" src="js/filmInfo.js"></script>

</body>
</html>
