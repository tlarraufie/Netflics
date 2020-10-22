<?php
    require_once '../connect.php';
    

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

    function getAllFavoris($dbh){
        
        try{
            //$sql = "SELECT * FROM Listes WHERE idUser = '".$_SESSION['idUser']."' ";
            $sql = "SELECT * FROM Listes L JOIN Films F ON L.idFilm = F.idFilm WHERE idUser = '".$_SESSION['idUser']."' ";
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

    function addFavoris($dbh,$idFilm){
        //Vérification de l'absence de la ligne dans la base avant ajout
        try{
            $requete = "SELECT * FROM Listes where 
            idUser = '".$_SESSION['idUser']."' AND idFilm = '".$idFilm."' ";
            $sth=$dbh->prepare($requete);
            $sth->execute();
            $response= $sth->fetchAll();
        }catch (Exception $e){
        echo '<pre>';
        var_dump($e);
        }

        if($response == null){
            try{
                
                $sql = "INSERT INTO Listes (idUser,idFilm,date) VALUES ('".$_SESSION['idUser']."','".$idFilm."','04/09/01');";
                $sth = $dbh->prepare( $sql );
                $sth->execute();

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

    function removeFavoris($dbh,$idFilm){

        try{          
            $sql = "DELETE FROM Listes WHERE idUser = '".$_SESSION['idUser']."' AND idFilm = '".$idFilm."'";
            $sth = $dbh->prepare( $sql );
            $sth->execute(); 
            
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
    }elseif($_SERVER["REQUEST_METHOD"]=="POST"){
        // try {

        //     if(isset($_POST['x']))
        //     {
        //         // $data=addFavoris($dbh);
        //         $data = $_POST['x'];
                
        //     }else{
        //         $data = "hello";
        //     }

        //     header('Content-Type: application/json');
        //     echo json_encode($data);
    
        // } catch (PDOException $e) {
        //     echo '<pre>';
        //     var_dump($e);
        //     die('could not connect to database');
        //     display404();
        // } 
        display404();
        
    }
    else{
        display404();
    }         
       
?>