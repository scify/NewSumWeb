<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Get informed fast, without losing the pluralism!">
        <meta name="author" content="SciFY.org">

        <!-- Le styles -->
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="css/index.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/global.css" rel="stylesheet">
        
        <script>
            function toggleSearch() {
                var ele = document.getElementById("toggleSearch");
                var text = document.getElementById("displaySearch");
                if (ele.style.display == "block") {
                    ele.style.display = "none";

                }
                else {
                    ele.style.display = "block";
                }
            }
        </script>
        <!--        google analytics-->
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-31632742-6', 'newsumontheweb.org');
            ga('send', 'pageview');

        </script>
        
        <title>NewSum on the Web</title>

    </head>
    <body>
        <?php
            set_include_path('./php');
            require_once 'common.php';
            require_once 'mysqlCommunicator.php';
            require_once 'PserverCommunicator.php';
            require_once 'sessionHandler.php';
            
            require_once $static_home.'navbar.php';
        ?>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="home">
                            <div id="myCarousel" class="carousel slide" style="margin-top: 40px">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                    <li data-target="#myCarousel" data-slide-to="3"></li>
                                </ol><br>
                                <div class="carousel-inner">
                               
                                   <!--fill carousel-->
                                    <?php
                                        require_once $static_home.'carousel.php';
                                    ?>
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                            </div>
                            
                            <?php //main page

                                require_once $static_home.'personalinfo.php';
                                   
                                echo '<div class="row-fluid">';

                                // Check if server online, and if not, show error page
                                $bErrorPage = false;
                                try {
                                    global $CURRENT_USER;
                                    $saCategories = getUserFeatureList($CURRENT_USER, null);
                                } catch (Exception $e) {
                                    // Should show Error Page
                                    $bErrorPage = true;
                                }
                                if ($bErrorPage) {
                                    echo  '
                                            <script type="text/javascript">
                                            window.location.href = "Error.php?lang=' . $lang . ' "
                                            setTimeout("location.reload();", 1000); //1 sec.
                                            </script> ';
                                }
                                //Fetch content from the server
                                $count = 1;
                                //load 8 first kategories
                                foreach ($saCategories as $i=>$sCurCat) {

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

                                        $sCurTopic = preg_replace("/\(\d+\)$/", "", $tempinfo[1]);
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

                                        echo'<a class="button" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . '&topicID=' . $sCurTopicID . '#summary">' . $sCurTopic . "</a>";
                                        echo'<br><small class="muted">' . $convertToDate . '</small></td></tr>';

                                        if ($topicCount % 4 == 0) {
                                            break;
                                        }
                                        $topicCount++;
                                    }


                                    echo '   </tbody>
                                        </table>
                                    </div><!--/span-->';

                                    if ($count % 4 == 0) {
                                        break;
                                    }

                                    $count++;
                                }
                                echo '   </div><!--/row-->';



                                echo'    </div><!--   tab-pane fade-->
                                    ';
                                require_once $static_home.'about.php';
                                require_once $static_home.'contact_tab.php';
                                require_once $static_home.'register.php';
                            ?>
                        </div><!--myTabContent-->
                    </div><!--/span-->
                </div><!--/row-->

                <hr>
                <?php
                    require_once $static_home.'footer.php';
                ?>
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
            $(function() {
                $('.carousel').carousel({
                    interval: 7000
                });
            });
            </script>
    </body>
</html>
