<html>
    <head>

        <script src="js/bootstrap/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="jquery.bootpag.min.js"></script>
       
        <link href="bootstrap-combined.min.css" rel="stylesheet">
        
    </head>
    <body>
        <p class="well demo content2">
            Dynamic content here. 
        </p>
        <div class="pagination-centered page"></div>
<!--        <p class="demo2"></p>-->
        <script>
            // init bootpag
            $('.page').bootpag({
                           total: 23,
                           page: 1,
                           maxVisible: 5 
                        }).on('page', function(event, num){
                            $(".content2").html("Page " + num); // or some ajax content loading...
                        });
        </script>
    </body>
</html>