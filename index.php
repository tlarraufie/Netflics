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
                echo '<button class="btn btn-news" onclick=getAllFilms()>Nouveautés</button>';
            }else{
                echo '<button class="btn btn-news" onclick=getAllFilms()>Nouveautés</button>';
            }
        
        ?>
            
            
        
    </nav>
    <!-- END NAVBAR SECTION -->
    
<main id="main"> 
    <!-- START SECTION -->

    <!-- TEMPLATE TILE -->
    <template id="tile-template">
        <div class="tile">
            <div class="tile-content">
                <img src="" alt="">
            </div>
            <div class="tile-footer">
                <p id="tile-title"></p>
                <button class="btnFavoris" onclick=""><i id="" class="fa fa-heart-o"></i></button>
            </div>
        </div>   
    </template>

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
            FillData(data);
            //return data;
        }).catch(err => {
        // Do something for an error here
        });
    }

    function getAllFilms(){
        var apiUrl = 'http://netflics.com/api/films';
        fetch(apiUrl).then(response => {
            return response.json();
        }).then(data => {
            FillData(data);
            // return data;
            
        }).catch(err => {
            // Do something for an error here
        });
        
    }

    function FillData(data){

        if (document.createElement("template").content) {

            //Vide complétement le container et supprime les éléments enfants
            var box = document.querySelector("#tile-container");
            while (box.firstChild) { 
                box.removeChild(box.firstChild); 
            } 

            //Remplissage du container avec les nouveaux enfants
            for (var object in data) {  

                //on récupère le template et on le clone
                var template = document.querySelector("#tile-template");
                var clone = document.importNode(template.content, true);

                //Remplissage de l'image
                var image = clone.querySelector("img");
                image.setAttribute("alt", data[object]["titre"]);
                image.setAttribute("src", data[object]["affiche"]);
            
                //Remplissage du titre
                var title = clone.querySelector("p");
                title.innerHTML= data[object]["titre"];

                //Remplissage du bouton
                var button = clone.querySelector("button");
                button.setAttribute("onclick", "toggleFavoris("+data[object]["idFilm"]+")");
                
                //Remplissage de l'icon 
                var icon = clone.querySelector("i");
                icon.setAttribute("id", data[object]["idFilm"]);

                // On récupère l'emplacement ou on veut insérer le template
                var tempBody = document.querySelector("#tile-container");
                
                //On ajoute notre item dans l'élément
                tempBody.appendChild(clone);
                
            }
            console.log("APRES: "+tempBody.hasChildNodes());
            console.log("Support Template tag");
        } else {
            console.log("Not support Template tag");
        }
    }

    function addFavoris(idFilm){

        alert(idFilm);
        const apiUrl = 'http://netflics.com/api/films?x='+idFilm;
        
        fetch(apiUrl)
        .then(response => {
            return response.json();
            
        })
        .then(data => {
            console.log(data);
            
            return resultat;
        }).catch(err => {
            // Do something for an error here
        }); 

    }

    function removeFavoris(idFilm){
        alert("removeFavoris");
    }

    function toggleFavoris(idFilm){
        var elem = document.getElementById(idFilm).classList;
        
        if(elem[1]=="fa-heart-o"){
            elem.replace("fa-heart-o","fa-heart");
            addFavoris(idFilm);
            // alert(idFilm)
        }else{
            elem.replace("fa-heart","fa-heart-o");
            // removeFavoris(idFilm);
        }  
    }

    // function getFavoris(){
    //     var apiUrl = 'http://netflics.com/api/films?favoris=true';
    // }
    // function getAllFilms(){
    //     var apiUrl = 'http://netflics.com/api/films';
    //     fetch(apiUrl).then(response => {
    //         return response.json();
    //     }).then(data => {

    //         // Work with JSON data here 
    //         document.getElementById("tile-container").innerHTML=""; 
    //         for (var object in data) {   
              
    //             document.getElementById("tile-container")
    //                 .innerHTML+=
    //                 `
    //                 <div class="tile">
    //                     <div class="tile-content">
    //                         <img src="${data[object]["affiche"]}" alt="affiche ${data[object]["titre"]}">
    //                     </div>
    //                     <div class="tile-footer">
    //                         <p>${data[object]["titre"]}</p>
    //                         <button class="btnFavoris" onclick="toggleFavoris(${data[object]["idFilm"]})" "><i id="${data[object]["idFilm"]}" class="fa fa-heart-o"></i></button>
    //                         <p id="testp"></p>
    //                     </div>
    //                 </div>
    //                 `;    
                    
    //         }
    //         return resultat;
    //         }).catch(err => {
    //         // Do something for an error here
    //     });
    // }

</script>

</body>
</html>
