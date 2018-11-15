$(document).ready(function () {
    //stops default event til all checks are met
    $("#user_form").submit(function (evt) {
        //initally set it to true unless a input is invalid
        var isValid = true;
        //takes in values from form fields
        var first_name = $("#fname").val();
        var last_name = $("#lname").val();
        var street1 = $("#street1").val();
        var street2 = $("#street2").val();
        var country = $("#country").val();
        
        //checks that all relevant fields are filled in returns a error message if it isnt
        if (first_name == "")
        {
            //if empty sets validity to false
            isValid = false;
            //prints out a  error message to relevant form
            $("#fname").prev().text(" (This is a required field)");
        } else {
            $("#fname").prev().text("");
        }

        if (last_name == "")
        {
            isValid = false;
            $("#lname").prev().text(" (This is a required field)");
        } else {
            $("#lname").prev().text("");
        }

        if (street1 == "")
        {
            isValid = false;
            $("#street1").prev().text(" (This is a required field)");
        } else {
            $("#street1").prev().text("");
        }

        if (street2 == "")
        {
            isValid = false;
            $("#street2").prev().text(" (This is a required field)");
        } else {
            $("#street2").prev().text("");
        }

        if (country == "")
        {
            isValid = false;
            $("#country").prev().text(" (This is a required field)");
        } else {
            $("#country").prev().text("");
        }
        //if all checks ok it submits form for processing
        if (isValid == true)
        {
            $("#user_form").submit();
        }
        //stops images opening up ina  new window
        evt.preventDefault();
    });


});