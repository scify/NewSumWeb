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
        <link href="css/index.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/global.css" rel="stylesheet">

        <script src="js/scify.index.js"></script>

        <script>
           
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
        <?php include ('php/navbar.php'); ?>
        <title>NewSum Web</title>
    </head>
    <body>


        <div class="container-fluid">
            <div class="row-fluid">

                <div class="span12">

                    <div id="myTabContent" class="tab-content">



                        <div class="tab-pane fade in active" id="home">

                            <div id="myCarousel" class="carousel slide">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <img src="img/carousel/newsumontheweb1.png" alt="">
                                        <div class="carousel-caption">
                                            <h4>Welcome to NewSum on the Web</h4>
                                            <p><i>"One news summary from many news sources...for free."</i></p>                                            
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="img/carousel/newsumontheweb2.png" alt="">
                                        <div class="carousel-caption">
                                            <h4>We reinforce pluralism in news coverage</h4>
                                            <p>Get informed fast, without losing the pluralism!</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="img/carousel/newsumontheweb3.png" alt="">
                                        <div class="carousel-caption">
                                            <h4>The unique NewSum android app: news on the go</h4>
                                            <p>Download NewSum at Google Play</p>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <img src="img/carousel/newsumontheweb4a.png" alt="">
                                        <div class="carousel-caption">
                                            <h4>We bring cutting-edge technology into everyday life for free</h4>
                                            <p><a href="http://www.scify.gr/site/en/" target="_blank" style="color: whitesmoke;">Check out more of our awesome projects at our site.</a></p>
                                        </div>
                                    </div>
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                            </div>

                            <?php
                            require_once 'php/common.php';
                            echo '<div class="row-fluid">';
                            $lang = $_GET["lang"];

                            if ($lang == "") {
                                $lang = 'gr';
                            }
                            $saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);

                            $count = 1;
                            //load 8 first kategories
                            foreach ($saCategories as $sCurCat) {

                                echo '      <div class="span3">
                                    <h3><a href="category.php?lang=' . $lang . '&categname=' . $sCurCat . ' ">' . $sCurCat . '</a></h3>
                                    <table class="table table-striped">
                                        <tbody>';

                                //load 2 first topics

                                $paramsTitles = new getTopicTitles();
                                $paramsTitles->sUserSources = "All";
                                $paramsTitles->sCategory = $sCurCat;
                                $saTopics = splitToFirstLevelSeparator($newsum->getTopicTitles($paramsTitles)->return);

                                $topicCount = 1;
                                $tempDate = "";
                                foreach ($saTopics as $sCurTopicInfo) {
                                    $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

                                    $sCurTopicID = $tempinfo[0];

                                    $sCurTopic = substr($tempinfo[1], 0, -3);
                                    $sCurTopicDate = $tempinfo[2];
                                    $seconds = $sCurTopicDate / 1000;
                                    $convertToDate = date("d-m-Y", $seconds);
                                    echo '<tr><td>';

//                                    if($topicCount == 1){
//                                       $tempDate= $convertToDate;
//                                         echo'<small class="text-center">' . $convertToDate . '</small>';
//                                    }
//                                   
//                                    if($tempDate!=$convertToDate){
//                                    echo'<small class="text-center">' . $convertToDate . '</small>';
//                                    }

                                    echo'<a class="button" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . '&topicID=' . $sCurTopicID . '">' . $sCurTopic . "</a>";
                                    echo'<br><small class="muted">' . $convertToDate . '</small></td></tr>';

                                    if ($topicCount % 2 == 0) {
                                        break;
                                    }
                                    $topicCount++;
                                }


                                echo '   </tbody>
                                    </table>
                                </div><!--/span-->';

                                if ($count % 8 == 0) {
                                    break;
                                }
                                if ($count % 4 == 0) {
                                    echo '   </div><!--/row-->
                                     <div class="row-fluid">';
                                }

                                $count++;
                            }
                            echo '   </div><!--/row-->';
                            ?>                 


                        </div><!--   tab-pane fade-->



                        <div class="tab-pane fade" id="about">

                            <div class="hero-unit">  

                                <h4> What is NewSum?</h4>

                                <p> NewSum automatically summarizes information 
                                    from many sources and combines them in a single text.<br>
                                    It gives you the main points (something like “tweets”) 
                                    of all the different information that you would get if 
                                    you read all the articles from the sources you visit 
                                    (or that you would like to have time to visit...)
                                    <br>With the use of cutting-edge artificial intelligence technology, news are summarised and all repeated information is not duplicated.
                                    What is more, you always have access to the news sources.</p>

                            </div>



                        </div>

                        <div class="tab-pane fade" id="contact">

                            <div class="row-fluid">

                                <div class="span3">


                                    <div class="hero-unit">  
                                        <address>

                                            <p class="text-center">   <a href="http://www.scify.gr/site/en/" target="_blank"><img src="img/logo trans_singleline_small.png" title="SciFY.org" width="50%" height="50%"></a></p>
                                            <p class="text-center">  <strong> SCIENCE FOR YOU NPO </strong></p>
                                            <p class="text-center">   4, I. Varvaki str., Gizi, 114 74 <br>Athens - Greece</p><br>
                                            <p class="text-center"> 
                                                <abbr title="Phone">P: </abbr> +30 211 0149 973 <br>
                                                <abbr title="Fax">F: </abbr>+30 211 0124 418<br>
                                                <abbr title="e-mail">E: </abbr><a href="mailto:#">info @ scify.org</a>
                                            </p>
                                            <!--                                            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                                            <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                            
                                                                                                    <div class="modal-header">
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                                        <h4 class="modal-title" id="myModalLabel">NewSumWeb Feedback</h4>
                                                                                                    </div>
                                                                                                    <div class="modal-body">
                                            
                                                                                                        <iframe width="640" height="1120" frameborder=0  marginheight="0" marginwidth="0"  src='https://docs.google.com/spreadsheet/viewform?formkey=dE5FTFJnMk40MnFXaEVsRmYtMkdENXc6MA#gid=0'></iframe>
                                            
                                                                                                    </div>
                                                                                                    <div class="modal-footer">
                                                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                                                    </div>
                                            
                                                                                                </div> /.modal-content 
                                                                                            </div> /.modal-dalog 
                                                                                        </div> /.modal 
                                            
                                                                                        <a data-toggle="modal" href="#myModal" class="btn btn-primary">Give us a feedback</a>-->


                                        </address>
                                    </div>

                                </div>



                                <div class="span3">

                                    <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=el&amp;geocode=&amp;q=%CE%99%CF%89%CE%AC%CE%BD%CE%BD%CE%BF%CF%85+%CE%92%CE%B1%CF%81%CE%B2%CE%AC%CE%BA%CE%B7+4+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1+114+74,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=62.99906,135.263672&amp;ie=UTF8&amp;hq=&amp;hnear=%CE%99%CF%89%CE%AC%CE%BD%CE%BD%CE%BF%CF%85+%CE%92%CE%B1%CF%81%CE%B2%CE%AC%CE%BA%CE%B7+4,+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1,+%CE%9A%CE%B5%CE%BD%CF%84%CF%81%CE%B9%CE%BA%CF%8C%CF%82+%CE%A4%CE%BF%CE%BC%CE%AD%CE%B1%CF%82+%CE%91%CE%B8%CE%B7%CE%BD%CF%8E%CE%BD,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;t=m&amp;ll=37.993525,23.743687&amp;spn=0.023675,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                                </div>



                            </div>
                        </div>



                    </div><!--myTabContent-->
                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; <a href="http://www.scify.gr/site/en/" target="_blank" style="color: #0088cc">SciFY</a> 2013</p>
            </footer>

        </div><!--/.fluid-container-->




        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="js/bootstrap/jquery-1.9.1.min.js"></script>
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
        <script>
            $(function(){
                $('.carousel').carousel({
                    interval: 7000
                });    
            });
    

        </script>
    </body>
</html>
