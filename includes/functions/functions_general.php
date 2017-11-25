<?php
//--------------------------------------GENERAL------------------------------------------//

//-----------------REDIRECT LOCATION-------------------//
function redirect($location){

    return header("Location:" . $location);
}

//-----------------QUERY CHECK-------------------//
function confirmQuery($result){
    global $connection;
if(!$result){
            die("QUERY FAILED" . mysqli_error($connection));
        }

}

//-----------------RECORD COUNT FROM A TABLE DATA-------------------//
function recordCount($table){

    global $connection;

    $query = "SELECT * FROM " . $table;
    $select_all_posts = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_all_posts);

    confirmQuery($result);

    return $result;
}





?>
