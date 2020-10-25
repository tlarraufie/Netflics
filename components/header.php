
<!-- Component HEADER qui est composé du menu principal pour naviguer entre les pages du site -->

<header id="header">
    <h1 id="title">
        <a href="index.php">NETFLICS</a>
    </h1>
    <nav id="navbar-top">          
        <ul>
            <?php 
                /**
                 * Si une session est en cours, on affiche le bouton deconnexion
                 * Sinon on affiche les boutons connexion et inscription
                 * */
                
                if($_SESSION['username'] != null){
                    echo '<li><a class="nav-link" href="index.php?deconnexion=true">Deconnexion</a></li>';
                }else{
                    echo '<li><a class="nav-link" href="index.php?page=inscription">Inscription</a></li>';
                    echo '<li><a class="nav-link" href="index.php?page=login">Connexion</a></li>';
                }
            
            ?>
                
            
        </ul>
    </nav>
</header>



