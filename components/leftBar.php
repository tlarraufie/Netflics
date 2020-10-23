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