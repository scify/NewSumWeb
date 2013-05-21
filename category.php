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
    <body>
        <div class="container-fluid">
            <div class="row-fluid">

                <div class="span12">

                    <div id="myTabContent" class="tab-content">



                        <div class="tab-pane fade in active" id="categories">
                            <?php
                            require_once 'php/common.php';


                            $category = $_GET["categname"];
                            $URLtopicID = $_GET["topicID"];
                            $lang = $_GET["lang"];

                            if ($lang == "") {
                                $lang = 'gr';
                            }


                            echo '<div class="span3">
                                <div class="well sidebar-nav">
                                    <h3>';


                            echo $category;


                            echo' </h3><br>
                                     <div id="topics" class="tab-content">';

                            $count = 1;
                            $pagecount = 1;

                            //load  topics

                            $paramsTitles = new getTopicTitles();
                            $paramsTitles->sUserSources = "All";
                            $paramsTitles->sCategory = $category;
                            $saTopics = splitToFirstLevelSeparator($newsum->getTopicTitles($paramsTitles)->return);


                            echo'<div class="tab-pane fade in active" id="page' . $count . '">
                                            <table class="table table-striped">
                                                <tbody>';
                            $idfirstTopic = "";
                            $summaryTopicTitle="";
                            foreach ($saTopics as $sCurTopicInfo) {
                                $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

                                $sCurTopicID = $tempinfo[0];
                               
                                $sCurTopic = $tempinfo[1];
                                $sCurTopicDate = $tempinfo[2];
                                $seconds = $sCurTopicDate / 1000;
                                $convertToDate = date("d-m-Y", $seconds);
                                
                                 if ($count == 1) {
                                    $idfirstTopic = $sCurTopicID;
                                    $summaryTopicTitle=$sCurTopic;
                                }
                                
                                if ($URLtopicID == $sCurTopicID) {
                                   
                                    $summaryTopicTitle=$sCurTopic;
                                }

                                echo '<tr><td><span class="label label-info">' . $convertToDate . '</span><br><a class="button" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . '&topicID=' . $sCurTopicID . '">' . $sCurTopic . "</a></td></tr>";

                                if ($count % 10 == 0) {

                                    $pagecount++;
                                    echo '</tbody></table></div>
                                    <div class="tab-pane fade" id="page' . $pagecount . '">
                                            <table class="table table-striped">
                                                <tbody>';
                                }
                                $count++;
                            }

                            echo '   </tbody></table></div>';


                            echo' </div>

                                    <div class="pagination pagination-centered">
                                        <ul id="myTab" class="nav pager">';

                            echo'   <li class="active"><a href="#page1" data-toggle="tab">1</a></li>';
                            for ($i = 2; $i <= $pagecount; $i++) {
                                echo'  <li><a  href="#page' . $i . '" data-toggle="tab">' . $i . '</a></li>';
                            }


                            echo'  </ul>
                                    </div>
                                   
                                </div><!--/.well--> 

                            </div><!--/span-->


                            <div class="span9" id="SummaryOutput">';

                            if ($URLtopicID == "") {
                                $URLtopicID = $idfirstTopic;
                            }
//                            =================================================
                            
                          

                            echo'  <div class="hero-unit">'.$summaryTopicTitle.'</div>';


                            $params = new getSummary();
                            $params->sTopicID = $URLtopicID;
                            $params->sUserSources = "All";
                            $bShouldRefresh = false;
                            try {
                                $saSentenceInfo = splitToFirstLevelSeparator($newsum->getSummary($params)->return);
                            } catch (Exception $e) {
                                // Should refresh
                                $bShouldRefresh = true;
                            }

// Check for empty response
                            if ($bShouldRefresh) {
                                echo '<div class="notice">The news have been updated. If the page does not refresh automatically in 3 seconds, press <a href="#" onClick="location.reload();">here</a>.</div>
  <script type="text/javascript">
    setTimeout("location.reload();", 3000); //3 sec.
  </script>
  ';
                                die;
                            }

                            $tempHTML = "<br>All Sources:";
                            echo '<table class="table table-striped"><tbody>';
                            foreach ($saSentenceInfo as $sCurSentenceInfo) {

                                $ThirdLevelSplit = splitToThirdLevelSeparator($sCurSentenceInfo);



                                if (sizeof($ThirdLevelSplit) != 1) {

                                    $tempSecondLVLsplit = splitToSecondLevelSeparator($sCurSentenceInfo);
                                    foreach ($tempSecondLVLsplit as $sCurSourceInfo) {
                                        $ThirdLevelSplit = splitToThirdLevelSeparator($sCurSourceInfo);
                                        $tempHTML = $tempHTML . '<a href="' . $ThirdLevelSplit[0] . '" target="_new">' . $ThirdLevelSplit[1] . "</a>   .  ";
                                    }
                                } else {



                                    $sSecondLVLsplit = splitToSecondLevelSeparator($sCurSentenceInfo);
                                    $text = $sSecondLVLsplit[0];
                                    $sourceLink = $sSecondLVLsplit[1];
                                    $source = $sSecondLVLsplit[3];
                                    if (!is_null($source)) {
                                        echo '<tr class><td>' . $text . "<br> Source: " . '<a href="' . $sourceLink . '" target="_new">' . $source . '</a></td></tr>';
                                    }
                                }
                            }
                            echo '<tr class><td>' . $tempHTML . '</td></tr>';
                            echo '<tr class><td></td></tr>';
                            echo '   </tbody></table>';



//                            echo'  <div class="hero-unit">
//                                   To Title prepei na loadarw edw
//                                </div>';
//
//                            echo'   <a href="#"> <i class=" icon-arrow-left"></i></a>
//                                <br>
//                                H επίσημη SoundCloud εφαρμογή για iOS και Android αναβαθμίστηκε και φέρνει υποστήριξη για 
//                                λογαριασμούς Google+, επιτρέποντας το χρήστη να χρησιμοποιήσει το Goole+ αντί του Facebook ή του 
//                                Twitter, ενώ φέρνει και υποστήριξη για διαμοιρασμό μέσω του Google+.
//                                Source: <a href="#">ONAIR24</a>
//
//                                All Sources:<a href="#">ONAIR24</a> . ';
//                             =================================================

                            echo' </div><!--/span-->';
                            ?>
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
