<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>NewSum on the web</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Get informed fast, without losing the pluralism!">
        <meta name="author" content="SciFY.org">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="img/favicon.ico">
        
        <!-- Bootstrap CSS -->
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
        
        <!-- Scify CSS -->
        <link href="css/scify/index.css" rel="stylesheet">
        <link href="css/scify/global.css" rel="stylesheet">

        <script src="js/scify/general.js"></script>
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
                                    if (count($saCategories) == 0) {
                                        $saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);
                                    }
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
                                //load 4 first kategories
                                foreach ($saCategories as $i=>$sCurCat) {

                                    echo '      <div class="span3">
                                        <h4><a href="category.php?lang=' . $lang . '&categname=' . $sCurCat . ' ">' . $sCurCat . '</a></h4>
                                        <table class="table table-striped">
                                            <tbody>';

                                    //load 4 first topics

                                    $paramsTitles = new getTopicTitles();
                                    $paramsTitles->sUserSources = "All";
                                    $paramsTitles->sCategory = $sCurCat;
                                    $saTopics = splitToFirstLevelSeparator($newsum->getTopicTitles($paramsTitles)->return);

                                    $dates = Array();
                                    $topics = Array();
                                    $arrangedTopics = Array();
                                    for ($i = 0; $i < count($saTopics); $i++) {
                                        $sCurTopicInfo = $saTopics[$i];
                                        $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

                                        $sCurTopicDate = $tempinfo[2];
                                        $seconds = $sCurTopicDate / 1000;
                                        $convertToDate = date("Y-m-d", $seconds);
                                        
                                        $topics[] = $convertToDate;
                                        $dates[] = $convertToDate;
                                    }
                                    arsort($dates);
                                    foreach ($dates as $curDate) {
                                        foreach ($topics as $i => $curTopicDate) {
                                            if ($curTopicDate == $curDate) {
                                                $arrangedTopics[] = $i;
                                            }
                                        }
                                        if (count($arrangedTopics) >= 4) {
                                            break;
                                        }
                                    }
                                    foreach (array_slice($arrangedTopics,0,4) as $cur=>$sCurTopicId) {
                                        $sCurTopicInfo = $saTopics[$sCurTopicId];
                                        $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

                                        $sCurTopicID = $tempinfo[0];

                                        $sCurTopic = preg_replace("/\(\d+\)$/", "", $tempinfo[1]);
                                        $sCurTopicDate = $tempinfo[2];
                                        $seconds = $sCurTopicDate / 1000;
                                        $convertToDate = date("d-m-Y", $seconds);
                                        echo '<tr><td>';
                                        echo'<a class="button" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . '&topicID=' . $sCurTopicID . '#summary">' . $sCurTopic . "</a>";
                                        echo'<br><small class="muted">' . $convertToDate . '</small></td></tr>';
                                    }


                                    echo '   </tbody>
                                        </table>
                                    </div><!--/span-->';

                                    if ($count % 4 == 0) {
                                        break;
                                    }

                                    $count++;
                                }
                                echo '   </div></div><!--/row-->';



                                echo'    </div><!--   tab-pane fade-->
                                    ';
                                require_once $static_home.'about.php';
                                require_once $static_home.'contact_tab.php';
                                require_once $static_home.'register.php';
                                require_once $static_home.'serverDown.php';
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
        <script src="js/jquery/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap/bootstrap-transition.js"></script>
        <script src="js/bootstrap/bootstrap-alert.js"></script>
        <script src="js/bootstrap/bootstrap-modal.js"></script>
        <script src="js/bootstrap/bootstrap-scrollspy.js"></script>
        <script src="js/bootstrap/bootstrap-tab.js"></script>
        <script src="js/bootstrap/bootstrap-tooltip.js"></script>
        <script src="js/bootstrap/bootstrap-button.js"></script>
        <script src="js/bootstrap/bootstrap-collapse.js"></script>
        <script src="js/bootstrap/bootstrap-carousel.js"></script>
        <script>
            $(function() {
                $('.carousel').carousel({
                    interval: 7000
                });
            });
        </script>
    </body>
</html>