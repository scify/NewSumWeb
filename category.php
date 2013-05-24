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

        <script src="js/bootstrap/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="rating/jquery.raty.min.js"></script>
        <script src="js/bootstrap/jquery.bootpag.min.js"></script>
        <script src="js/jquery.cookie.js"></script>


        <link href="css/bootstrap-combined.min.css" rel="stylesheet">
        <!-- Le styles -->
        <link href="css/bootstrap/bootstrap.css" rel="stylesheet">
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
        <link href="css/bootstrap/bootstrap-responsive.css" rel="stylesheet">
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
        <title>NewSum Web</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row-fluid">

                <div class="span12">

                    <div id="myTabContent" class="tab-content">



                        <div class="tab-pane fade in active" id="categories">
                            <?php
                            require_once ('php/common.php');
                            require_once("php/regDomain.inc.php");


                            $category = $_GET["categname"];
                            $URLtopicID = $_GET["topicID"];
                            $lang = $_GET["lang"];

                            if ($lang == "") {
                                $lang = 'gr';
                            }


                            echo '<div class="span3">
                                <div class="well sidebar-nav">
                                    <h3 class="text-center">';


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


                            echo'<div class="tab-pane fade in active" id="page' . $pagecount . '">
                                            <table class="table table-striped">
                                                <tbody>';
                            $idfirstTopic = "";
                            $summaryTopicTitle = "";
                            $tempDate = "";
                            foreach ($saTopics as $sCurTopicInfo) {
                                $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

                                $sCurTopicID = $tempinfo[0];

                                $sCurTopic = substr($tempinfo[1], 0, -3);
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
                                echo '<tr><td>';
                                echo'<a class="button" href="category.php?lang=' . $lang . '&categname=' . $category . '&topicID=' . $sCurTopicID . '">' . $sCurTopic . "</a></td></tr>";

                                if ($count % 10 == 0) {

                                    $pagecount++;
                                    echo '</tbody></table></div>
                                    <div class="tab-pane fade" id="page' . $pagecount . '">
                                            <table class="table table-striped">
                                                <tbody>';
                                    $tempDate = "";
                                }
                                $count++;
                            }

                            echo '   </tbody></table></div></div>';




//                                    <div class="pagination pagination-centered">
//                                        <ul id="myTab" class="nav pager">';
//
//                            echo'   <li class="active"><a href="#page1" data-toggle="tab">1</a></li>';
//                            for ($i = 2; $i <= $pagecount; $i++) {
//                                echo'  <li><a  href="#page' . $i . '" data-toggle="tab">' . $i . '</a></li>';
//                            }
//
//
//                            echo'  </ul>
//                                    </div>
                            echo '<div class="pagination-centered paging"></div> ';
                            echo '<script>
                                 // init bootpag
                                 $(\'.paging\').bootpag({
                                            total:' . $pagecount . ' ,
                                            page: 1,
                                            maxVisible: 5 
                                }).on(\'page\', function(event, num){
                                    $("#page"+num).active
                                });
                                </script>';

                            echo'</div><!--/.well--> 

                            </div><!--/span-->


                            <div class="span7" id="SummaryOutput">';

                            if ($URLtopicID == "") {
                                $URLtopicID = $idfirstTopic;
                            }

//                            =================================================



                            echo'  <div class="hero-unit text-center"><img src="img/bee2.png">  <i>   ' . $summaryTopicTitle . '   </i>  <img src="img/bee1.png"></div>';


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
                                        $tempHTML = $tempHTML . "<a href='$ThirdLevelSplit[0]' target='_new'><img title='".$ThirdLevelSplit[1]."' alt='".$ThirdLevelSplit[1]."' src='http://www.google.com/s2/favicons?domain=".$sDomain."'> </a>  .  ";
                                     
                                    }
                                } else {



                                    $sSecondLVLsplit = splitToSecondLevelSeparator($sCurSentenceInfo);
                                    $text = $sSecondLVLsplit[0];
                                    $sourceLink = $sSecondLVLsplit[1];
                                    $source = $sSecondLVLsplit[3];
                                    $sDomain = getRegisteredDomain(parse_url($sourceLink, PHP_URL_HOST));
                                                                        
                                    if (!is_null($source)) {
                                        echo '<tr class><td>' . $text . "<br> Source: " . '<a href="' . $sourceLink . '" target="_new"><img title="'.$source.'" alt="'.$source.'" src="http://www.google.com/s2/favicons?domain='.$sDomain.'"></a></td></tr>';
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
                                            <img src="img/rightdownloadbanner.png" class="img-polaroid">
                                        </td>
                                    </tr>
                                    <tr>  
                                        <td>
                                            <br>
                                            <p class="text-center"> <a href="https://play.google.com/store/apps/details?id=gr.scify.newsum.ui" class="btn btn-primary" target="_blank">Download Now</a></p>
                                        </td>

                                    </tr>
                                </table>
<!--                                <img src="img/rightdownloadbanner.png" class="img-polaroid">
                                <br></br>
                            
                                <a data-toggle="modal" href="#myModal" class="btn btn-primary">Download Now</a>-->

                            </div>


                        </div>




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
                <p>&copy; <a href="http://www.scify.gr/site/en/" target="_blank">SciFY</a> 2013</p>               
            </footer>

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


    </body>
</html>
