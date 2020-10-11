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
                <li><a class="nav-link" href="login.php">S'inscrire</a></li>
                <li><a class="nav-link" href="login.php">Se connecter</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- END HEADER SECTION -->

    <!-- NAVBAR SECTION -->
    <nav id="navbar-left">
        <div class="search">
            <input onkeydown="search()" type="text" id="search-bar" placeholder="search...">
        </div>
        
        <ul>
            <li><a class="nav-link" href="#introduction">Ma liste</a></li>
            <li><a class="nav-link" href="#What_you_should_already_know">Nouveautées</a></li>
        </ul>
    </nav>
    <!-- END NAVBAR SECTION -->
    
<main id="main"> 
    <!-- tester si l'utilisateur est connecté -->
    <a href='index.php?deconnexion=true'><span>Déconnexion</span></a>
    <?php
        session_start();
        if(isset($_GET['deconnexion']))
        { 
            if($_GET['deconnexion']==true)
            {  
                session_unset();
                header("location:index.php");
            }
        }
        else if($_SESSION['username'] !== ""){
            $user = $_SESSION['username'];
            // afficher un message
            echo "<br>Bonjour $user, vous êtes connectés";
        }
    ?>

    <!-- TEST -->
        <!-- <input onclick='test()' type="button" value="click"> -->
        <!-- <h1 id="test">HELLO</h1> -->
    <!-- TEST -->


    
    <!-- START SECTION -->
    <div class="tile-grid" id="tile-container">
        

    </div>
    
 
    <!-- END SECTION -->
</main>

<script src="https://kit.fontawesome.com/yourcode.js"></script>
<script type="text/javascript">

    window.onload = ()=>{
        getData();
        
    }

    // function test(){
    //     document.getElementById("test").innerHTML="REUSSI";
    // }

    function getData(){
        var apiUrl = 'http://netflics.com/api/films';
        fetch(apiUrl)
            .then(response => {
                return response.json();
            })
            .then(data => {
                // Work with JSON data here 
                for (var object in data) {    
                    document.getElementById("tile-container")
                        .innerHTML+=
                        `
                        <div class="tile">
                            <div class="tile-content">
                                <img src="${data[object]["affiche"]}" alt="affiche titanic">
                            </div>
                            <div class="tile-footer">
                                <p>${data[object]["titre"]}</p>
                                <a class="addtowishlist"><i class="fa fa-heart-o"></i></a>
                            </div>
                        </div>
                        `;     
                }
                return resultat;
            }).catch(err => {
            // Do something for an error here
        });
    }
    


</script>

</body>
</html>