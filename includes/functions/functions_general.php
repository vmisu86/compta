<?php
//--------------------------------------GENERAL------------------------------------------//

//-----------------REDIRECT LOCATION-------------------//
//fonction de rediriger un autre endroit
function redirect($location){

    return header("Location:" . $location);
}

//-----------------QUERY CHECK-------------------//
//fonction pour vérifier les requêtes
function confirmQuery($result){
    global $connection;
if(!$result){
            die("QUERY FAILED" . mysqli_error($connection));
        }

}

//-----------------RECORD COUNT FROM A TABLE DATA-------------------//
//Compter les enregistrements de la table
function recordCount($table){

    global $connection;

    $query = "SELECT * FROM " . $table;
    $select_all_posts = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_all_posts);

    confirmQuery($result);

    return $result;
}





?>
