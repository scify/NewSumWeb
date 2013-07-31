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

        <script src="js/bootstrap/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="rating/jquery.raty.min.js"></script>
        <script src="js/bootstrap/jquery.bootpag.min.js"></script>
        <script src="js/jquery.cookie.js"></script>


        <link href="css/bootstrap-combined.min.css" rel="stylesheet">
        <!-- Le styles -->
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
        <link href="css/global.css" rel="stylesheet">
        
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
            require_once 'regDomain.inc.php';
            require_once 'mysqlCommunicator.php';
            require_once 'PserverCommunicator.php';
            require_once 'sessionHandler.php';
            
            require_once $static_home.'navbar.php';
        ?>
        <div class="container-fluid" style="margin-top: 40px">
            <div class="row-fluid">

                <div class="span12">

                    <div id="myTabContent" class="tab-content">



                        <div class="tab-pane fade in active" id="categories">
                            <?php
                            
                            $category = $_GET["categname"];
                            $URLtopicID = $_GET["topicID"];

                            echo '<div class="span3">
                                <div class="well sidebar-nav">
                                    <h3 class="text-center">';
                            
                            increaseFeatureValue($CURRENT_USER,$category,1);
                            
			    # Topic Index anchor
			    echo'<a name="topicList"></a>';
                            echo $category;


                            echo' </h3>
                                     <div id="topics" class="tab-content">';

                            $count = 1;
                            $pagecount = 1;

                            //load  topics

                            $paramsTitles = new getTopicTitles();
                            $paramsTitles->sUserSources = "All";
                            $paramsTitles->sCategory = $category;
                            $saTopics = splitToFirstLevelSeparator($newsum->getTopicTitles($paramsTitles)->return);



                            echo'<div class="tab-pane fade in active page" id="page' . $pagecount . '">
                                            <table class="table table-striped">
                                                <tbody>';
                            $idfirstTopic = "";
                            $summaryTopicTitle = "";
                            
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
                                if (count($arrangedTopics) >= 10) {
                                    break;
                                }
                            }
                            foreach (array_slice($arrangedTopics,0,10) as $cur=>$sCurTopicId) {
                                $sCurTopicInfo = $saTopics[$sCurTopicId];
                                $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

                                $sCurTopicID = $tempinfo[0];

                                $sCurTopic = preg_replace("/\(\d+\)$/", "", $tempinfo[1]);
                                $sCurTopicDate = $tempinfo[2];
                                $seconds = $sCurTopicDate / 1000;
                                $convertToDate = date("d-m-Y", $seconds);

                                if ($count == 1) {
                                    $idfirstTopic = $sCurTopicID;
                                    $summaryTopicTitle = $sCurTopic;
                                    $tempDate = $convertToDate;
                                    echo '<tr class="Tlabel"><td style="padding: 4px;">';
//                                    echo'<span class="label label-info">' . $convertToDate . '</span><br>';
                                    echo'<h6 class="text-center" style="line-height: 10px; margin: 1px 0;">' . $convertToDate . '</h6>';
                                    echo '</tr></td>';
                                }

                                if ($URLtopicID == $sCurTopicID) {

                                    $summaryTopicTitle = $sCurTopic;
                                }


                                if ($convertToDate != $tempDate) {
//                                    echo'<span class="label label-info">' . $convertToDate . '</span><br>';
                                    echo '<tr class="Tlabel"><td style="padding: 4px;">';
                                    echo'<h6 class="text-center" style="line-height: 10px; margin: 1px 0;">' . $convertToDate . '</h6>';
                                    echo '</tr></td>';
                                    $tempDate = $convertToDate;
                                }
                                echo '<tr id="' . $sCurTopicID . '"><td>';
				//  Directly move to summary
                                echo'<a class="button" href="category.php?lang=' . $lang . '&categname=' . $category . '&topicID=' . $sCurTopicID . '#summary">' . $sCurTopic . "</a></td></tr>";

                                if ($count % 10 == 0) {

                                    $pagecount++;
                                    echo '</tbody></table></div>
                                    <div class="tab-pane fade page" id="page' . $pagecount . '">
                                            <table class="table table-striped">
                                                <tbody>';
                                    $tempDate = "";
                                }
                                $count++;
                            }

                            echo '   </tbody></table></div></div>';




                            if ($URLtopicID == "") {
                                $URLtopicID = $idfirstTopic;
                            }
                            echo '<div class="pagination-centered paging"></div> ';
                            echo '<script>
                                 // init bootpag
                                 var selectedPage = $("#' . $URLtopicID . '").parents(".page");
                                 $("#' . $URLtopicID . '").addClass("selected");
                                 var index = selectedPage.index()+1;

                                 var selectPage = function(pageNum){
                                    $(".page").hide();
                                    $(".page.active").removeClass("active");
                                    $(".page.in").removeClass("in");
                                    $("#page"+pageNum).show().addClass("active").addClass("in");                                     
                                 };
                                 $(\'.paging\').bootpag({
                                            total:' . $pagecount . ' ,
                                            page: index,
                                            maxVisible: 5 
                                }).on(\'page\', function(event, num){
                                   selectPage(num);
                                });
                                selectPage(index);
                                </script>';

                            echo'</div><!--/.well--> 

                            </div><!--/span-->


                            <div class="span7" id="SummaryOutput">';

//                            =================================================



			    // Title and summary anchor
                            echo'  <div class="hero-unit text-center"><a name="summary"></a>  <i>   ' . $summaryTopicTitle . '   </i> </div>';

			    // Back to topics. Visible only on Non-desktop layouts
                            echo'  <div class="text-center hidden-desktop"><a class="button" href="#topicList">'.$TR['BackToTopicList.'.$lang].'</a></div>';

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
                                        window.location.href = "category.php?lang=' . $lang . '&categname=' . $category . '"
                                        setTimeout("location.reload();", 3000); //3 sec.
                                        </script>
                                        ';
                                die;
                            }
                            echo'<label id="summaryid" style="display:none" >' . $URLtopicID . '</label>';
                            $tempHTML = "<br>All Sources:";
                            $Allsummary = "";
                            echo '<table class="table table-striped"><tbody>';
                            foreach ($saSentenceInfo as $sCurSentenceInfo) {

                                $ThirdLevelSplit = splitToThirdLevelSeparator($sCurSentenceInfo);


                                if (sizeof($ThirdLevelSplit) != 1) {

                                    $tempSecondLVLsplit = splitToSecondLevelSeparator($sCurSentenceInfo);
                                    foreach ($tempSecondLVLsplit as $sCurSourceInfo) {
                                        $ThirdLevelSplit = splitToThirdLevelSeparator($sCurSourceInfo);
                                        $sDomain = getRegisteredDomain(parse_url($ThirdLevelSplit[0], PHP_URL_HOST));
                                        $tempHTML = $tempHTML . "<a href='$ThirdLevelSplit[0]' target='_blank'><img title='" . $ThirdLevelSplit[1] . "' alt='" . $ThirdLevelSplit[1] . "' src='http://www.google.com/s2/favicons?domain=" . $sDomain . "'> </a>  .  ";
                                    }
                                } else {


                                    $sSecondLVLsplit = splitToSecondLevelSeparator($sCurSentenceInfo);
                                    $text = $sSecondLVLsplit[0];
                                    $sourceLink = $sSecondLVLsplit[1];
                                    $source = $sSecondLVLsplit[3];
                                    $sDomain = getRegisteredDomain(parse_url($sourceLink, PHP_URL_HOST));

                                    if (!is_null($source)) {
                                        echo '<tr class><td>' . $text . "<br> Source: " . '<a href="' . $sourceLink . '" target="_blank"><img title="' . $source . '" alt="' . $source . '" src="http://www.google.com/s2/favicons?domain=' . $sDomain . '"></a></td></tr>';
                                    }
                                }
                            }

                            echo '<tr class><td>' . $tempHTML . '</td></tr>';
                            echo '<tr class><td></td></tr>';
                            echo '   </tbody></table>';

                            echo '<div id="ratingDiv"><h5 class="text-left">Please rate this summary:</h5><div id="rating-star"></div></div>';


//                             =================================================
                            echo '';
                            echo' </div><!--/span-->';
                            ?>

                            <div class="span2" >
                                <br></br>
                                <br></br>
                                <br></br>
                                <table>
                                    <tr>
                                        <td>
                                            <img src="img/rightdownloadbanner.png" class="img-polaroid" width="90%">
                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <br>
                                            <p class="text-center"> <a href="https://play.google.com/store/apps/details?id=gr.scify.newsum.ui" class="btn btn-primary" target="_blank">Download Now</a></p>
                                        </td>

                                    </tr>
                                </table>

                            </div><!--/span-->

                        </div><!-- tab categories-->
                        <?php
                            require_once $static_home.'about.php';
                            require_once $static_home.'contact_tab.php';
                            require_once $static_home.'register.php';
                        ?>
                    </div><!--myTabContent-->
                </div><!--/span-->
            </div><!--/row-->
            <?php
                 require_once $static_home.'footer.php';
             ?>
        </div><!--/.fluid-container-->

        <script type="text/javascript">
            
            function s4() {
                return Math.floor((1 + Math.random()) * 0x10000)
                .toString(16)
                .substring(1);
            };

            function guid() {
                return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
                    s4() + '-' + s4() + s4() + s4();
            }
            
            $(function() {
                $.fn.raty.defaults.path = 'rating/';
                
                 

                $('#rating-star').raty({
                    click: function(score, evt) {
                       
                        //                        alert('ID: ' + $(this).attr('id') + "\nscore: " + score + "\nsummary: " + evt.type);
                        
                        var sUserID;
                        if (!$.cookie("userID")) {
                            sUserID = "NewSumWeb" + guid();
                        
                            $.cookie("userID", sUserID);
                        }
                        else
                            sUserID = $.cookie("userID");
                                                
                       
                        
                        $.post(
                        "php/rate.php", {'sid': $("#summaryid").html(), 'rating':score, 'userID': sUserID}, function (data) {  alert('Thank you for your rating.'); }
                    );
                        
                        $("#ratingDiv").fadeOut("slow"); 
                        
                       
                    },
                    hints: ['1', '2', '3', '4', '5']
                });

            });
        </script>
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
        <script src="js/bootstrap/bootstrap-typeahead.js"></script>

    </body>
</html>