<?php
    require_once '../connect.php';
    

    /**
     * Fonction qui retourne l'ensemble de la collection des films
     */
    function getAllFilms($dbh){

        try{
            $sql = 'SELECT * FROM films';
            $sth = $dbh->prepare( $sql );
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }
        catch (PDOException $e){
            echo '<pre>';
            var_dump($e);
        }
    }


    /**
     * Fonction qui retourne les films favoris de l'utilisateur qui est passé en paramètre
     * On interroge la table Liste qui permet de retrouver les favoris de l'utilisateur
     */
    function getAllFavoris($dbh){
        
        try{
            //$sql = "SELECT * FROM Listes WHERE idUser = '".$_SESSION['idUser']."' ";
            $sql = 'SELECT * FROM Listes L JOIN Films F ON L.idFilm = F.idFilm WHERE idUser = :id ';
            $sth = $dbh->prepare( $sql );
            $sth->execute(array(':id' => $_SESSION['idUser']));
            $data = $sth->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }
        catch (PDOException $e){
            echo '<pre>';
            var_dump($e);
        }
    }

    
    /**
     * Fonction qui ajoute un film dans la liste de favoris de l'utilisateur
     */
    function addFavoris($dbh,$idFilm){
        //Vérification de l'absence de la ligne dans la base avant ajout
        try{
            $requete = "SELECT * FROM Listes where idUser = :idUser AND idFilm = :idFilm";
            $sth=$dbh->prepare($requete);
            $sth->execute(array(':idUser' => $_SESSION['idUser'], ':idFilm' => $idFilm));
            $response= $sth->fetchAll();
        }catch (Exception $e){
        echo '<pre>';
        var_dump($e);
        }

        //Si il n'y a pas de lignes, on peut peux effectuer l'insertion
        if($response == null){
            try{
                
                $sql = "INSERT INTO Listes (idUser,idFilm) VALUES (:idUser,:idFilm);";
                $sth = $dbh->prepare( $sql );
                $sth->execute(array(':idUser' => $_SESSION['idUser'], ':idFilm' => $idFilm));

                $data = "ADD REUSSI".$idFilm;
                
            }
            catch (PDOException $e){
                echo '<pre>';
                var_dump($e);
                $data = "ADD ERROR";
            }
        }
            
        return $data;
    }


    /**
     * Fonction qui retire un film des favoris de l'utilisateur
     */
    function removeFavoris($dbh,$idFilm){

        try{          
            $sql = "DELETE FROM Listes WHERE idUser = :idUser AND idFilm = :idFilm";
            $sth = $dbh->prepare( $sql );
            $sth->execute(array(':idUser' => $_SESSION['idUser'], ':idFilm' => $idFilm)); 
            
            $data = "REMOVE REUSSI".$idFilm;
        }
        catch (PDOException $e){
            echo '<pre>';
            var_dump($e);
            $data = "REMOVE ERROR";
        }
        return $data;
    }


   
    if($_SERVER["REQUEST_METHOD"]=="GET"){

        try {

            if(isset($_GET['favoris'])){
                if($_GET['favoris']==true)
                $data = getAllFavoris($dbh);

            }elseif(isset($_GET['add'])){
                $idFilm = $_GET['add'];
                

                addFavoris($dbh,$idFilm);

            }elseif(isset($_GET['remove'])){
                $idFilm = $_GET['remove'];
                

                removeFavoris($dbh,$idFilm);

            }else{
                $data = getAllFilms($dbh);
            }
            
            header('Content-Type: application/json');
            echo json_encode($data);
    
        } catch (PDOException $e) {
            echo '<pre>';
            var_dump($e);
            die('could not connect to database');
            display404();
        }        
    }else{
        display404();
    }         
       
?>