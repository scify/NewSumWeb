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
            function init() {
      
                
                //                initcarousel();
            }
            //            function initcarousel() {
            //                
            //                $('.carousel').carousel("cycle")
            //            }
        
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
    <body onload="init();">


        <div class="container-fluid">
            <div class="row-fluid">

                <div class="span12">

                    <div id="myTabContent" class="tab-content">



                        <div class="tab-pane fade in active" id="home">
                            <div class="hero-unit">

                                <p align="center"><strong>Welcome to NewSum Web</strong><br>
                                    <i>"The best news aggregator...In the world."</i></p>

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
                                    <h2><a href="category.php?lang=' . $lang . '&categname=' . $sCurCat . ' ">' . $sCurCat . '</a></h2>
                                    <table class="table table-striped">
                                        <tbody>';

                                //load 3 first topics

                                $paramsTitles = new getTopicTitles();
                                $paramsTitles->sUserSources = "All";
                                $paramsTitles->sCategory = $sCurCat;
                                $saTopics = splitToFirstLevelSeparator($newsum->getTopicTitles($paramsTitles)->return);

                                $topicCount = 1;
                                $tempDate="";
                                foreach ($saTopics as $sCurTopicInfo) {
                                    $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

                                    $sCurTopicID = $tempinfo[0];

                                    $sCurTopic = $tempinfo[1];
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






                    </div><!--myTabContent-->
                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; <a href="http://www.scify.gr/site/en/" target="_blank">SciFY</a> 2013</p>
            </footer>

        </div><!--/.fluid-container-->




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
