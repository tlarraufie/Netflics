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


   
    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $data = getAllFilms($dbh);
        header('Content-Type: application/json');
        echo json_encode($data);
    }else{
        display404();
    }
        
    
    
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