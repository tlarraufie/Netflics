   
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflics</title>
    <link href="styles/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- HEADER and LeftBar SECTION-->

    <?php include_once 'components/header.php'; ?>

     <!-- END HEADER and LeftBar SECTION-->
    
   
        <!-- START SECTION -->
        <div class="erreur">
            <h1>Page non trouvée</h1>
            <h2>Desolé, la ressource que vous recherchez semble inexistante ou obselete</h2>
            <button onclick="window.location.href='index.php'">Retourner à l'accueil</button>
        </div>
        
    
        <!-- END SECTION -->


</body>
</html>

<style>
    .erreur{
        width:100%;
        height:100vh;
        
        display:flex;
        flex-direction:column;
        justify-content:center;
        text-align:center;
    }
    .erreur h1{
        font-size:44px;
        margin:2rem;
    }
   
    .erreur button{
        padding: 20px 20px;
        margin: 4rem 40% 2rem 40%;
        font-size:20px;
        font-weight:600;
        cursor:pointer;
    }

</style>
