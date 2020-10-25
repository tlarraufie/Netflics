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
        
        <form class="formulaire" action="login_response.php" method="POST">
            
            
            
            <div class="form-fields">
                <div class="form-header">
                    <h1>Connexion</h1>
                </div>
                <hr>
                <div class="form-group">
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" name="username" required>
                </div>

                <div class="form-group">
                    <label><b>Mot de passe</b></label>
                    <input type="password" name="password" required>
                </div>

                <div class="form-footer">
                    <input type="submit" id='submit' value='LOGIN' >
                </div>

                
                <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<div class='form-erreur'><p>Utilisateur ou mot de passe incorrect</p></div>";
                    }
                ?>
                
            </div>
           
            
            
        </form>
    </div>
    
    
</body>
</html>