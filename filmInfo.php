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
            <p id="auteur"></p>
            <p id="distributeur"></p>
            <p id="duree"></p>
            <p id="date"></p>
        </div>
    </div>

    
    


    <!-- END SECTION -->
</main>

<script src="https://kit.fontawesome.com/yourcode.js"></script>
<script type="text/javascript">



    window.onload=() => {
        idFilm = document.querySelector("img").getAttribute("id"); 
        console.log(idFilm);  

        getFilmInfo(idFilm); 
    }

    function search(){
        var text = document.getElementById("search-bar").value;
        document.getElementById("search-output").innerHTML=text;
    }

    function getFilmInfo(){
        var apiUrl = 'http://netflics.com/api/films/'+idFilm;
        console.log(apiUrl);
        fetch(apiUrl).then(response => {
            return response.json();
        }).then(data => {
            FillData(data);
            //return data;
        }).catch(err => {
        // Do something for an error here
        });
    }


    function FillData(data){
        console.log(data[0]["titre"]);
        console.log(data[0]["affiche"]);
        image = document.querySelector("img");
        image.setAttribute("src",data[0]["affiche"]);
        image.setAttribute("alt",data[0]["titre"]);

        titre = document.getElementById("titre");
        titre.innerHTML= data[0]["titre"];
        
        auteur = document.getElementById("auteur");
        auteur.innerHTML= "<strong>auteur: </strong>&nbsp;"+data[0]["auteur"];

        distributeur = document.getElementById("distributeur");
        distributeur.innerHTML= "<strong>distributeur: </strong>&nbsp;"+data[0]["distributeur"];

        duree = document.getElementById("duree");
        duree.innerHTML= "<strong>durée: </strong>&nbsp;"+data[0]["duree"];

        date = document.getElementById("date");
        date.innerHTML= "<strong>date:</strong>&nbsp;"+data[0]["date"];
    }


</script>

</body>
</html>
