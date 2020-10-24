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

?>
    
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflics</title>
    <link href="styles/main.css" rel="stylesheet">
    <link href="styles/index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- HEADER and LeftBar SECTION-->

    <?php include_once 'components/header.php'; ?>

    <?php include_once 'components/leftBar.php'; ?>

     <!-- END HEADER and LeftBar SECTION-->
    
    <main id="main"> 
        <!-- START SECTION -->

        <!-- TEMPLATE TILE -->
        <template id="tile-template">
            <div class="tile">
                <div class="tile-content">
                    <a href=""><img src="" alt=""></a>
                </div>
                <div class="tile-footer">
                    <p class="title" id="tile-title"></p>
                    <!-- <button class="btnFavoris" onclick=""><i id="" class="fa fa-heart-o"></i></button> -->
                    <i onclick="alert('ett')" id=""></i></a>
                </div>
            </div>   
        </template>

        <div class="tile-grid" id="tile-container">
            

        </div>
        
    
        <!-- END SECTION -->
    </main>

<script src="https://kit.fontawesome.com/yourcode.js"></script>
<script type="text/javascript" src="js/accueil.js"></script>

</body>
</html>
