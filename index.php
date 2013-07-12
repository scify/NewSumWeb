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

        <script src="js/scify.index.js"></script>
<!--        <script type="text/javascript">

            function resize(multiplier) {
                if (document.body.style.fontSize == "") {
                    document.body.style.fontSize = "1.0em";
                }
                document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
            }

        </script>-->

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
<?php include ('php/navbar.php'); ?>
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
                               
                                   <!--fill carousel-->
                                    <?php
                                        require_once 'php/common.php';
                                        require_once 'statics.php';

                                        $lang = $_GET["lang"];

                                        fill_carousel($lang);
                                    ?> 
                                </div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                                <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                            </div>
                            
                            <?php //main page
                            echo '<div class="row-fluid">';

                            // Check if server online, and if not, show error page
                            $bErrorPage = false;
                            try {
                                $saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);
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



                            echo'    </div><!--   tab-pane fade-->';
                            
                            create_about_tab($lang);
                            create_contact_tab();
                            ?>
                        </div><!--myTabContent-->
                    </div><!--/span-->
                </div><!--/row-->

                <hr>

                <footer>
                    <div class="row-fluid show-grid">
                        <!--class="info">-->


                        <div class="span2">
                            by <a href="http://www.scify.gr/site/en/" target="_blank" style="color:#0088CC;">SciFY</a> 2013             
                        </div>   
                        <div class="span7"></div>
                        <div class="span3">
                            <!-- AddThis Follow BEGIN -->
                            Connect with <b>SciFY!</b>
                            <div class="addthis_toolbox addthis_32x32_style addthis_default_style">
                                <a class="addthis_button_facebook_follow" addthis:userid="SciFY.org"></a>
                                <a class="addthis_button_twitter_follow" addthis:userid="SciFY_org"></a>
                                <a class="addthis_button_linkedin_follow" addthis:userid="scify-not-for-profit-company" addthis:usertype="company"></a>
                                <a class="addthis_button_google_follow" addthis:userid="109032045993620015107"></a>
                                <a class="addthis_button_youtube_follow" addthis:userid="SciFYNPO"></a>
                            </div>
                        </div>
                        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-51a2142b65a49a07"></script>
                        <!-- AddThis Follow END -->
                    </div>
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
            $(function() {
                $('.carousel').carousel({
                    interval: 7000
                });
            });


            </script>
    </body>
</html>
