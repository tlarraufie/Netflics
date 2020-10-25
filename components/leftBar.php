<!-- Component leftBAR qui est composé du bandeau de droite avec la barre de recherche et les boutons de favoris et de nouveautés -->

<nav id="navbar-left">
    <?php 
        if($_SESSION['username'] != null){
            echo "<div class='user'><h2>Bonjour $user !</h2></div>";
        }
        
        
    ?>
    
    <div class="search">
        <input onkeyup="search()" type="text" id="search-bar" placeholder="search...">
    </div>
    <h1 id="test"></h1>
    
    <?php 
        if($_SESSION['username'] != null){
            echo '<button class="btn btn-fav" onclick=getFavoris()>Ma Liste</button>';
        }
        
        echo '<button class="btn btn-news" onclick=getAllFilms()>Découvrir</button>';
        
    
    ?>

</nav>
<!-- END NAVBAR SECTION -->