<?php
    require_once '../connect.php';

    //Récupère une instance de la collection films avec l'id du film en paramètre
    function getFilm($dbh){
        try{
            $sql = 'SELECT * FROM Films WHERE idFilm = :id';
            $sth = $dbh->prepare( $sql );
            $sth->execute(array(':id' => $_GET['api_params'][0]));
            $data = $sth->fetchAll(PDO::FETCH_OBJ);

            return $data;
        }
        catch (PDOException $e){
            echo '<pre>';
            var_dump($e);
        }
    }

    if($_SERVER["REQUEST_METHOD"]=="GET"){
        $data = getFilm($dbh);
        header('Content-Type: application/json');
        echo json_encode($data);
    }else{
        display404();
    }
   
?>