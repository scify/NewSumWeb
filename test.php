<html>
    <head>

        <script src="js/bootstrap/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.bootpag.min.js"></script>
       
        <link href="css/bootstrap-combined.min.css" rel="stylesheet">
         <script src="js/OpenLayers-2.12/OpenLayers.js"></script>
        <script>
           
            var map, layer;
            function initmap(){
                map = new OpenLayers.Map( 'map');
                layer = new OpenLayers.Layer.OSM( "Simple OSM Map");
                map.addLayer(layer);
                map.setCenter(
                new OpenLayers.LonLat(-71.147, 42.472).transform(
                new OpenLayers.Projection("EPSG:4326"),
                map.getProjectionObject()
            ), 12
            );    
            }

            function toggleSearch() {
                var ele = document.getElementById("toggleSearch");
                var text = document.getElementById("displaySearch");
                if(ele.style.display == "block") {
                    ele.style.display = "none";
                    
                }
                else {
                    ele.style.display = "block";     
                }
            } 
        </script>
    </head>
    <body onload="initmap()">
        
        <div id="map" ></div>
        
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