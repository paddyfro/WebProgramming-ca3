<?php
//takes in data from index page form
$fname = filter_input(INPUT_POST, 'firstName');
$lname = filter_input(INPUT_POST, 'lastName');
$street1 = filter_input(INPUT_POST, 'street1');
$street2 = filter_input(INPUT_POST, 'street2');
$country = filter_input(INPUT_POST, 'country');
$county = filter_input(INPUT_POST, 'county');
$town = filter_input(INPUT_POST, 'town');
?>


<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Web CA3 2018</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="script/splashJs.js" type="text/javascript"></script>        
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKc19_aeDlJAsGCxi0OVWrqSfWPCbQbiE"></script>
        <link href="css/splashStyle.css" rel="stylesheet" type="text/css"/>

    </head>
    <body> 
        <div class="flip-container" ontouchstart="this.classList.toggle('hover');">
            <div class="flipper">
                <div class="front">
                    <!-- front content -->
                    <img src="images/gravity_falls_card_front.jpg" alt=""/>
                </div>
                <div class="back">
                    <!-- back content -->
                    <div class="names"><?php echo $fname . " " . $lname; ?>,</div>
                    <div class="street"><?php echo $street1 . ", " . $street2; ?>,</div>
                    <div class="town_county"><?php echo $town . ", " . $county; ?>,</div>
                    <div class="country"><?php echo $country; ?>.</div>
                    <div id="map">
                        maps goes here
                    </div>
                    <img src="images/postcard_back.jpg" alt=""/>

                </div>
            </div>
        </div>

        <script>
            //takes in country town and county values. from the php post
            var country = "<?php Print($country); ?> ";
            var county = "<?php Print($county); ?> ";
            var town = "<?php Print($town); ?> ";
            
            //initialises the map
            function initMap() {
                //creates a new map object using the map div
                var map = new google.maps.Map(document.getElementById('map'), {
                    //sets the initial zoom
                    zoom: 9,
                    //ireland => 53.4129° N, -8.2439° W
                    //default map centre before looking for new location
                    center: {lat: 53.3498, lng: -6.2603}
                });
                //creates a new geocoder variable to get lat and lon from text values
                var geocoder = new google.maps.Geocoder();


    //                        geocodeAddress(geocoder, map);

//                var address = "Ireland, louth, dundalk";
                //creates string to get lat and lon values for
                var address = country + ", " + county + ", " + town;
                //ajax call takes in address variable and store it as bvariable uses the function and tries to get new geolocation
                geocoder.geocode({'address': address}, function (results, status) {
                    //if everything is aok in query
                    if (status === 'OK') {
                        //gets first elemnt of the json array returned from inputing the address into the gerocoder function
                        map.setCenter(results[0].geometry.location);
                        //sets a new map marker for positioning on map
                        var marker = new google.maps.Marker({
                            //sets the map to teh mapp object created above
                            map: map,
                            //sets new position to the lat and lon  returned in the json array
                            position: results[0].geometry.location
                        });
                    } else {
                        //alerts if there is an issue with the request
                        alert('Geocode was not successful for the following reason: ' + status);
                    }
                });

            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKc19_aeDlJAsGCxi0OVWrqSfWPCbQbiE&callback=initMap">
                    //loads in googlemap api using user key
        </script>
    </body>
</html>
