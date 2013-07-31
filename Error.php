<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Server Error</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Get informed fast, without losing the pluralism!">
        <meta name="author" content="SciFY.org">
        
                <!-- Favicon -->
        <link rel="icon" type="image/png" href="img/favicon.ico">
        
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
        
    </head>
    <body>

        <div class="hero-unit" style="background-color: #d9d9d9">
            <?php
            $lang = $_GET["lang"];
            if ($lang == "en") {
                echo ' <h2>Unfortunately, our server is offline...</h2>
                        <p>Try navigating to <a href="http://www.scify.gr/site/en/" target="_blank" >our site</a>
                            to see other projects, or try to reload the page from the button below.</p>
                        <p><a href="index.php" class="btn btn-inverse btn-small">Reload Page</a></p> ';
            } else {
                echo ' <h2>Δυστυχώς, ο server μας είναι εκτός λειτουργίας...</h2>
                        <p>Μπορείτε να επισκεφτείτε την <a href="http://www.scify.gr/site/el/" target="_blank" >ιστοσελίδα μας</a>
                            για να ενημερωθείτε για τα υπόλοιπα projects με τα οποία ασχολούμαστε, 
                            ή να δοκιμάσετε να μεταφερθείτε στην αρχική σελίδα.</p>
                        <p><a href="index.php" class="btn btn-inverse btn-small">Αρχική σελίδα</a></p> ';
            }
            ?>
        </div>
    </body>
</html>
