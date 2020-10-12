<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="form.css" rel="stylesheet">
</head>
<body>
    <!-- HEADER SECTION-->

    <header id="header">
        <h1 id="title">
            <a href="index.php">NETFLICS</a>
        </h1>
        <nav id="navbar-top">          
            <ul>
                <li><a class="nav-link" href="#">S'inscrire</a></li>
                <li><a class="nav-link" href="#">Se connecter</a></li>
            </ul>
        </nav>
    </header>
    
    <!-- END HEADER SECTION -->

    <div id="container">
        <!-- zone de connexion -->
        
        <form class="formulaire" action="inscription_response.php" method="POST">
            <div class="form-header">
                <h1>Inscription</h1>
            </div>
            
            
            <div class="form-fields">
                <div class="form-group">
                    <label><b>Nom</b></label>
                    <input type="text" placeholder="Entrer votre nom" name="nom" required>
                </div>
                <div class="form-group">
                    <label><b>Prénom</b></label>
                    <input type="text" placeholder="Entrer votre prénom" name="prenom" required>
                </div>
                <div class="form-group">
                    <label><b>Age</b></label>
                    <input type="number" id="age" name="age" min="5" max="100">
                </div>
                <div class="form-group">
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
                </div>

                <div class="form-group">
                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                </div>
            </div>
            <div class="form-footer">
                <input type="submit" id='submit' value='INSCRIPTION' >
            </div>
            
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                else if(isset($_GET['info'])){
                    echo "<p style='color:cyan'>Inscription réussi</p>";
                }
            ?>
        </form>
    </div>
    
    
</body>
</html>