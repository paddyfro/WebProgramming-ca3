<?php

require_once("./includes/database.php");


if (isset($_POST["query"])) {
    $output = '';
    
    //returns a list of the countries that match the posted query values
    $query = 'SELECT * FROM countries WHERE country LIKE "%" :np_name  "%"';
    $statement = $db->prepare($query);
    $statement->bindValue(':np_name', $_POST["query"]);
    $statement->execute();
    $countryDeets = $statement->fetchAll();
    $statement->closeCursor();
    
    
    //append the start of the unordered list to the output variable
    $output = '<ul class="list-unstyled">';
    //checking if the array returned from the query has values
    if (count($countryDeets) > 0) {
        foreach ($countryDeets as $country) {
            //append to output a list elemet with the country name
            $output .= '<li>' . $country["country"] . '</li>';
        }
    } else {
        //output if country not found
        $output .= '<li>Country Not Found</li>';
    }
    //finished unordered list
    $output .= '</ul>';
    //outputs data back to ajax query
    echo $output;
}