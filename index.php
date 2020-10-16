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
    <link href="index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <!-- HEADER SECTION-->

    <header id="header">
        <h1 id="title">
            <a href="index.php">NETFLICS</a>
        </h1>
        <nav id="navbar-top">          
            <ul>
                <?php 
                    if($_SESSION['username'] != null){
                        echo '<li><a class="nav-link" href="index.php?deconnexion=true">Deconnexion</a></li>';
                    }else{
                        echo '<li><a class="nav-link" href="inscription.php">Sinscrire</a></li>';
                        echo '<li><a class="nav-link" href="login.php">Se connecter</a></li>';
                    }
                
                ?>
                    
                
            </ul>
        </nav>
    </header>
    
    <!-- END HEADER SECTION -->

    <!-- NAVBAR SECTION -->
    <nav id="navbar-left">
        <?php 
            echo "<div class='user'><h2>$user</h2></div>";
            
        ?>
        
        <div class="search">
            <input onkeydown="search()" type="text" id="search-bar" placeholder="search...">
        </div>
        <h1 id="test"></h1>
        
        <?php 
            if($_SESSION['username'] != null){
                echo '<button class="btn btn-fav" onclick=getFavoris()>Ma Liste</button>';
                echo '<button class="btn btn-news" onclick=test()>Nouveautés</button>';
            }else{
                echo '<button class="btn btn-news" onclick=test()>Nouveautés</button>';
            }
        
        ?>
            
            
        
    </nav>
    <!-- END NAVBAR SECTION -->
    
<main id="main"> 
       <!-- START SECTION -->
   
    <h1 id="titre"></h1>

    <div class="tile-grid" id="tile-container">
        

    </div>
    
 
    <!-- END SECTION -->
</main>

<script src="https://kit.fontawesome.com/yourcode.js"></script>
<script type="text/javascript">


    
    window.onload=() => {
        getAllFilms();
    }

    function test(){
        document.getElementById("tile-container").innerHTML="REUSSI";
    }

    

    function search(){
        var text = document.getElementById("search-bar").value;
        document.getElementById("search-output").innerHTML=text;
    }
    // ,{method:"POST"})
    function getFavoris(){
        var apiUrl = 'http://netflics.com/api/films?favoris=true';
        fetch(apiUrl).then(response => {
            return response.json();
        }).then(data => {
            // Work with JSON data here
            document.getElementById("tile-container").innerHTML=""; 
            for (var object in data) {  
                
                document.getElementById("tile-container")
                    .innerHTML+=
                    `
                    <div class="tile">
                        <div class="tile-content">
                            <img src="${data[object]["affiche"]}" alt="affiche ${data[object]["titre"]}">
                        </div>
                        <div class="tile-footer">
                            <p>${data[object]["titre"]}</p>
                            <a onclick="" class="addtowishlist"><i class="fa fa-heart-o"></i></a>
                            
                        </div>
                    </div>
                    `;     
            }
            return resultat;
            }).catch(err => {
            // Do something for an error here
        });
    }


    function getAllFilms(){
        var apiUrl = 'http://netflics.com/api/films';
        fetch(apiUrl).then(response => {
            return response.json();
        }).then(data => {
            // Work with JSON data here 
            document.getElementById("tile-container").innerHTML=""; 
            for (var object in data) {   
                
                document.getElementById("tile-container")
                    .innerHTML+=
                    `
                    <div class="tile">
                        <div class="tile-content">
                            <img src="${data[object]["affiche"]}" alt="affiche ${data[object]["titre"]}">
                        </div>
                        <div class="tile-footer">
                            <p>${data[object]["titre"]}</p>
                            <button class="btnFavoris" onclick="addFavoris(${data[object]["idFilm"]})" "><i id="${data[object]["idFilm"]}" class="fa fa-heart-o"></i></button>
                            <p id="testp"></p>
                        </div>
                    </div>
                    `;     
            }
            return resultat;
            }).catch(err => {
            // Do something for an error here
        });
    }

    function addFavoris(idFilm){
        var elem = document.getElementById(idFilm).classList;
        
        if(elem[1]=="fa-heart-o"){
            elem.replace("fa-heart-o","fa-heart");
        }else{
            elem.replace("fa-heart","fa-heart-o");
        }
        
        
    }

</script>

</body>
</html>
