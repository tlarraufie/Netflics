

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



