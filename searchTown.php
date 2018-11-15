<?php

require_once("./includes/database.php");

//takes county name from ajax
$name = $_POST['county'];

//gets county id that is associated with a particulkar county name thats in the county text box
$query1 = 'select id from counties where name = :np_name';
$statement = $db->prepare($query1);
$statement->bindValue(':np_name', $name);
$statement->execute();
$countyDeets = $statement->fetch();
$statement->closeCursor();

//makes sure there was a posted bariable
if (!empty($_POST['county'])) {
    //gets array of towns that are linked to the county id
    $query = "SELECT townName FROM towns WHERE countyID = :np_name ORDER BY townName ASC";
    $statement = $db->prepare($query);
    $statement->bindValue(':np_name', $countyDeets['id']);
    $statement->execute();
    $townDeets = $statement->fetchAll();
    $statement->closeCursor();

    echo "<option value = ' '>Select Town</option>";
    //checks that there is data in the array
    if (count($townDeets) > 0) {

        foreach ($townDeets as $towns) {
            //outputs select option html code for each town
            echo "<option value = " . $towns['townName'] . ">" . $towns['townName'] . "</option>";
        }
    } else {
        echo "<option value = ' '>Town not found</option>";
    }
}
