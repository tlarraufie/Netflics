<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link href="styles/form.css" rel="stylesheet">
</head>
<body>
    <!-- HEADER SECTION-->

    <?php include_once 'components/header.php'; ?>
    
    <!-- END HEADER SECTION -->

    <div id="container">
        <!-- zone de connexion -->
        
        <form class="formulaire" action="inscription_response.php" method="POST">

            <div class="form-fields">
                <div class="form-header">
                    <h1>Inscription</h1>
                </div>
                <hr>

                <div class="form-group">
                    <label><b>Nom</b></label>
                    <input type="text" name="nom" required>
                </div>
                <div class="form-group">
                    <label><b>Prénom</b></label>
                    <input type="text" name="prenom" required>
                </div>
                <div class="form-group">
                    <label><b>Age</b></label>
                    <input type="number" id="age" name="age" min="5" max="100">
                </div>
                <div class="form-group">
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" name="username" required>
                </div>

                <div class="form-group">
                    <label><b>Mot de passe</b></label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-footer">
                    <input type="submit" id='submit' value='INSCRIPTION' >
                </div>

                <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2){
                            echo "<div class='form-erreur'><p>Vous devez rentrer tout les champs</p></div>";
                        }elseif($err == 3){
                            echo "<div class='form-erreur'><p>Nom d'utilisateur déjà pris !</p></div>";
                        }
                            
                    }elseif(isset($_GET['info'])){
                        $err = $_GET['info'];
                        if($err==1){
                            echo "<div class='form-info'><p>Inscription réussi !  <a href='index.php?page=login'>Connexion</a> </p></div>";
                        }
                    }
                ?>
            </div>
            
            
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                
            ?>
        </form>
    </div>
    
    
</body>
</html>