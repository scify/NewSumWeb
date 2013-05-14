<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="My personal web page">
        <meta name="author" content="Panagiotis Giotis">

        <!-- Le styles -->
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
        <style type="text/css">
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
            .sidebar-nav {
                padding: 9px 0;
            }

            @media (max-width: 980px) {
                /* Enable use of floated navbar text */
                .navbar-text.pull-right {
                    float: none;
                    padding-left: 5px;
                    padding-right: 5px;
                }
            }
        </style>
        <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
        <script>
            function init() {
                
                initcarousel();
            }
            function initcarousel() {
                
                $('.carousel').carousel("cycle")
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

        <title>NewSum Web</title>
    </head>
    <body onload="init();">

        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#"><img src="img/logoNewSum-simple.png" alt="" width="40" height="39"> NewSumWeb</a>
                    <div class="nav-collapse collapse">

                        <ul class="nav">
                            <li class="active" ><a href="#home" data-toggle="tab">Home</a></li>
                            <li><a href="#about" data-toggle="tab">About</a></li>
                            <li><a href="#contact" data-toggle="tab">Contact</a></li>
                            <li>

                                <ul class="nav" role="navigation">
                                    <li class="dropdown"><a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" >Choose Category <b class="caret"></b></a>
                                        <ul id="categoryMenu" class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onClick="alert('Ellada')"> Ellada</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onClick="alert('Texnologia')"> Texnologia</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onClick="alert('Kosmos')"> Kosmos</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onClick="alert('Epistimi')"> Epistimi</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                    </div><!--/.nav-collapse -->
                    <a href="?lang=gr"><img src="img/gr.png" alt="Greek Flag" width=16 height=11/></a>  
                    <a href="?lang=en"><img src="img/us.png" alt="en Flag" width=16 height=11/></a>
                    <!--<a href="http://www.scify.gr/site/en/support-us" target="_new"><i class="icon-gift icon-white"></i></a>-->
                    <table>
                        
                        <tr>
                       <td>  <a href="http://www.scify.gr/site/en/support-us" target="_new"><i class="icon-gift icon-white"></i></a><a id="displaySearch" href="javascript:toggleSearch();"><i class="icon-search icon-white"></i></a></td>
                        <td><div id="toggleSearch" style="display: none"> 
                            <form class="form-search">
                                <input type="text" class="input-small search-query">
                                <button type="submit" class="btn">Search</button>
                            </form>
                        </div>
                        </td>
                    </tr>
                    </table>

                </div><!--/container-fluid -->
            </div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span3">


                    <div class="well sidebar-nav">
                        <h1>GetCategory output</h1><br>
                        <h3>Ellada</h3><br>
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 1</a><br>
                                        mpla mpla mpla mpla mpla mpla mpla
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 2</a><br>
                                        mpla mpla mpla mpla mpla mpla mpla
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 3</a><br>
                                        mpla mpla mpla mpla mpla mpla mpla
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div><!--/.well -->
                </div><!--/span-->
                <div class="span9">

                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div class="hero-unit">

                                <p align="center"><strong>Welcome to NewSum Web</strong><br>
                                    <i>"The best news aggregator...In the world."</i></p>

                            </div>


                            <div id="myCarousel" class="carousel slide">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <p class="text-center"> 
                                        <h1>ELLada</h1><br>
                                        Edw tha emfanizonte ta top 2-3 news gia kathe kathgoria<br>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 1</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 2</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 3</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div>
                                    <div class="item">
                                        <p class="text-center"> 
                                        <h1>texnologia</h1><br>
                                        Edw tha emfanizonte ta top 2-3 news gia kathe kathgoria<br>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 1</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 2</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 3</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div>
                                    <div class="item">
                                        <p class="text-center"> 
                                        <h1>kosmos</h1><br>
                                        Edw tha emfanizonte ta top 2-3 news gia kathe kathgoria<br>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 1</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 2</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <a href="http://www.scify.gr/site/en/" target="_blank">Title 3</a><br>
                                                        mpla mpla mpla mpla mpla mpla mpla
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>


                                        </p>
                                    </div>
                                </div>
                                <!--carousel nav-->
                                <!--                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                                                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>-->
                            </div>


                            <!--                            <div class="row-fluid">
                            
                                                            <div class="span4">
                                                                <h2>Heading</h2>
                                                                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                                                <p><a class="btn" href="#">View details &raquo;</a></p>
                                                            </div>/span
                                                            <div class="span4">
                                                                <h2>Heading</h2>
                                                                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                                                <p><a class="btn" href="#">View details &raquo;</a></p>
                                                            </div>/span
                                                            <div class="span4">
                                                                <h2>Heading</h2>
                                                                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                                                <p><a class="btn" href="#">View details &raquo;</a></p>
                                                            </div>/span
                                                            
                                                            
                                                        </div>/row-->
                        </div>

                        <div class="tab-pane fade" id="about">

                            <div class="hero-unit">  

                                NewSumWeb is mpla mpla mpla mpla mpla<br>
                                mpla mpla mpla mpla mpla
                            </div>


                        </div>

                        <div class="tab-pane fade" id="contact">
                            <div class="hero-unit">  
                                <address>
                                    <strong> SCIENCE FOR YOU NPO - <a href="http://www.scify.gr/site/en/" target="_blank">SciFY</a> </strong><br>
                                    4, I. Varvaki str., Gizi, 114 74 Athens - Greece<br>
                                    <abbr title="Phone">P: </abbr> +30 211 0149 973 <br>
                                    <abbr title="Fax">F: </abbr>+30 211 0124 418<br>
                                    <abbr title="e-mail">E: </abbr><a href="mailto:#">info @ scify.org</a><br></br>
                                    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.gr/maps?f=q&amp;source=s_q&amp;hl=el&amp;geocode=&amp;q=%CE%99%CF%89%CE%AC%CE%BD%CE%BD%CE%BF%CF%85+%CE%92%CE%B1%CF%81%CE%B2%CE%AC%CE%BA%CE%B7+4&amp;aq=&amp;sll=37.989688,23.745857&amp;sspn=0.001951,0.004128&amp;ie=UTF8&amp;hq=&amp;hnear=%CE%99%CF%89%CE%AC%CE%BD%CE%BD%CE%BF%CF%85+%CE%92%CE%B1%CF%81%CE%B2%CE%AC%CE%BA%CE%B7+4,+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1,+%CE%9A%CE%B5%CE%BD%CF%84%CF%81%CE%B9%CE%BA%CF%8C%CF%82+%CE%A4%CE%BF%CE%BC%CE%AD%CE%B1%CF%82+%CE%91%CE%B8%CE%B7%CE%BD%CF%8E%CE%BD&amp;t=m&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small></small>

                                </address>
                            </div>
                        </div>


                    </div>



                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; <a href="http://www.scify.gr/site/en/" target="_blank">SciFY</a> 2013</p>
            </footer>

        </div><!--/.fluid-container-->


        <?php
        // put your code here
        ?>




        <!-- Le javascript
================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap/jquery.js"></script>
        <script src="js/bootstrap/bootstrap-transition.js"></script>
        <script src="js/bootstrap/bootstrap-alert.js"></script>
        <script src="js/bootstrap/bootstrap-modal.js"></script>
        <script src="js/bootstrap/bootstrap-dropdown.js"></script>
        <script src="js/bootstrap/bootstrap-scrollspy.js"></script>
        <script src="js/bootstrap/bootstrap-tab.js"></script>
        <script src="js/bootstrap/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap/bootstrap-popover.js"></script>
        <script src="js/bootstrap/bootstrap-button.js"></script>
        <script src="js/bootstrap/bootstrap-collapse.js"></script>
        <script src="js/bootstrap/bootstrap-carousel.js"></script>
        <script src="js/bootstrap/bootstrap-typeahead.js"></script>
    </body>
</html>
