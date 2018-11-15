$(document).ready(function () {
    //clears each text box
    $('input[type=text]').each(function () {
        $(this).val('');
    });
    //hides county and town div boxes
    $("#county_div").hide();
    $("#town_div").hide();


    //as text is input into the country box
    $('#country').keyup(function () {
        //takes the values
        var query = $(this).val();
        //so long as the query is not empty
        if (query != '')
        {
            //posts whatever text is in the box to teh search page
            $.ajax({
                url: "search.php",
                method: "POST",
                data: {query: query},
                success: function (data)
                {
                    //fades in the list of countries
                    $('#countryList').fadeIn();
                    //displays the html of the data returned which is an unordered list
                    $('#countryList').html(data);
                }
            });
        }
    });


    //on the click of a li element
    $(document).on('click', 'li', function () {
        //takes the values clicked and puts it in the text box for country
        $('#country').val($(this).text());
        //fades out list
        $('#countryList').fadeOut();
        //displays the county div
        $("#county_div").fadeIn(2000);
        //pop county sleect box 
        popCounty($('#country').val());
    });

    function popCounty($CountryName) {
        //use name to find id of country ther use that to pop select list for counties
        
        $.ajax({
            method: "POST",
            url: "searchCounty.php",
            data: {county: $CountryName}
        })
                //once done it pop[ulates the select county list with its option values
                .done(function (data) {
//                    alert(data);
                    $("#county").html(data);
//                  $("#town_div").fadeIn();                  
                });
    }

    $("#county").change(function () {
//        alert($('#county').val());
        $("#town_div").fadeIn(1500);
        popTown($('#county').val());

    });

    function popTown($CountyName)
    {
        //use county name to find town name
        $.ajax({
            method: "POST",
            url: "searchTown.php",
            data: {county: $CountyName}
        })

                .done(function (data) {
//                    alert(data);
                    $("#town").html(data);
                });
    }
//geocoder


});