<!--
References
- http://www.webslesson.info/2016/06/ajax-autocomplete-textbox-using-jquery-php-and-mysql.html
- https://www.youtube.com/watch?v=IG4v0CHRlBQ
- http://coding.academy/how-to-create-a-jquery-ajax-and-php-autocomplete-script
- https://stackoverflow.com/questions/1402227/click-event-on-select-option-element-in-chrome
- http://technotip.com/3541/dynamic-suggested-list-html5-jquery-php-mysql/
- https://stackoverflow.com/questions/14078067/jquery-disable-autocomplete-in-input
- https://developers.google.com/maps/documentation/javascript/examples/geocoding-simple
- https://www.sanwebe.com/2014/08/css-html-forms-designs
- https://davidwalsh.name/css-flip
- https://css-tricks.com/text-blocks-over-image/
- https://www.fontsquirrel.com/fonts/list/popular
- https://www.sanwebe.com/2014/08/css-html-forms-designs
- https://codepen.io/secondfret/pen/mIBqf
- https://designshack.net/articles/css/5-simple-and-practical-css-list-styles-you-can-copy-and-paste

Author:Patrick McDonnell
ID: D00006968
Date:28/02/2018
Course: Bachelor of Science(Honours) in Computing
-->


<!DOCTYPE html>  
<html>  
    <head>  
        <title>Web CA3 2018</title>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="script/script.js" type="text/javascript"></script>
        <link rel="icon" type="image/jpg" href="iconOdin.png">
        <link href="css/formStyle.css" rel="stylesheet" type="text/css"/>
        <script src="script/validation.js" type="text/javascript"></script>
    </head>  
    <body>  
        <br /><br />  
        <div class="container">  
            <div class="form-style-5">
            <form id="user_form" action="splashPage.php" method="POST">
                <fieldset>
                <legend><span class="number">1</span> User Details...</legend>
                <!--<h1>Enter yon deets here....</h1><br />--> 

                <label>First Name:</label><span class="frm_valid"> </span>
                <input type="text" id="fname" name="firstName" class="form-control" placeholder="First name" autocomplete="off">

                <label>Last Name:</label><span class="frm_valid"> </span>
                <input type="text" id="lname" name="lastName" class="form-control" placeholder="Last name" autocomplete="off">
                </fieldset>
                
                <legend><span class="number">2</span> Location Details...</legend>
                <fieldset>
                <label>Street 1:</label><span class="frm_valid"> </span>
                <input type="text" id="street1" name="street1" class="form-control" placeholder="street 1" autocomplete="off">

                <label>Street 2:</label><span class="frm_valid"> </span>
                <input type="text" id="street2" name="street2" class="form-control" placeholder="street 2" autocomplete="off">
                
                <label>Country Name:</label> <span class="frm_valid"> </span> 
                <input type="text" name="country" id="country" class="form-control" autocomplete="off" placeholder="Country Name" />  
                <div id="countryList"></div>

                <div id="county_div">
                    <label>Select county name:</label>
                    <select id="county" class="form-control" name="county">
                        
                    </select>
                </div>

                <div id="town_div">
                    <label>Select town name:</label>
                    <select id="town" class="form-control" name="town">
                    </select>
                </div>
                
                </fieldset>
                <input type="submit" class="form-control">
            </form>
            </div>
        </div>  
    </body>  
</html>  
