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

    function getSearch($dbh, $search){
        try{
            //On récupère les films contenant dans leur titre ce qui à été tapé dans la barre de recherche
            $sql = "SELECT * FROM films WHERE titre=%'".$search."'%";

            $sth = $dbh->prepare( $sql);
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }
        catch (PDOException $e){
            echo '<pre>';
            var_dump($e);
        }
    }

   
    if($_SERVER["REQUEST_METHOD"]=="GET"){

        try {
            
            if(isset($_GET['favoris'])){
                if($_GET['favoris']==true){
                $data = getAllFavoris($dbh);
                }
            }else if (isset($_GET['searchCheck'])){
                if(($_GET['searchCheck']==true) && ($_GET['searchInputAPI'] != NULL)){
                    $search=$_GET['searchInputAPI'];
                    $data = getSearch($dbh, $search);
                }
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
     
    if ($_SERVER)
    
    
    // foreach($allCharacters as $student){
    //     print_r($student->name.' : '.$student->tribe);
    //     echo '<br><br>';
    // }

    
    // $response = [
    //     "data" => "Voici une reponse generique pour une collection"
    // ];

    /*
        - comment afficher le code erreur
        - comment afficher les champs
        - comment faire le tri


    */
    
    
        
?>