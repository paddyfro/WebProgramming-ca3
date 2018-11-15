<?php

require_once("./includes/database.php");

$name = $_POST['county'];

//gets country id of country that in in country text box on index page
$query1 = 'select id from countries where country like :np_name';
$statement = $db->prepare($query1);
$statement->bindValue(':np_name', $name);
$statement->execute();
$countryDeets = $statement->fetch();
$statement->closeCursor();



if (!empty($_POST['county'])) {
    //gets a array of counties that are related to the country id
    $query = "SELECT name FROM counties WHERE country_id = :np_name ORDER BY name ASC";
    $statement = $db->prepare($query);
    $statement->bindValue(':np_name', $countryDeets['id'] );
    $statement->execute();
    $countyDeets = $statement->fetchAll();
    $statement->closeCursor();
    
    echo "<option value = ' '>Select County</option>";
    //cehcks to see that there is data returned
    if (count($countyDeets) > 0) {
        foreach ($countyDeets as $county) {
            //outputs the option html code for that particular county
            echo "<option value = " . $county['name'] . ">" . $county['name'] . "</option>";
        }
    }else{
            echo "<option value = ' '>County not found</option>";
        }
}