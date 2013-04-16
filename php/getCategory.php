<?php

require_once 'common.php';
#$params=new getCategorySources();
$category = $_GET["category"];
#$category="Europe";
// $params->sCategory="Αθλητικά";
// $saSources=$newsum->getCategorySources($params)->return;

$paramsTitles = new getTopicTitles();
$paramsTitles->sUserSources = "All";
$paramsTitles->sCategory = $category;
$saTopics = splitToFirstLevelSeparator($newsum->getTopicTitles($paramsTitles)->return);



#echo '<div class="warning">'.$category.'</div>';
//echo '<div class="container-fluid"><div class="row-fluid"><div class="span2">';
echo '<table class="table table-striped"><tbody>';


#TODO: Check the date 
$changeboole = true;
foreach ($saTopics as $sCurTopicInfo) {
    $tempinfo = splitToSecondLevelSeparator($sCurTopicInfo);

    $sCurTopicID = $tempinfo[0];

    $sCurTopic = $tempinfo[1];
    $sCurTopicDate = $tempinfo[2];
    $seconds = $sCurTopicDate / 1000;
    $convertToDate = date("d-m-Y", $seconds);
    if ($changeboole) {
        echo '<tr class="info"><td><a href="#" onClick="getCategoryByDate(\'' . $category . '\', \'' . $convertToDate . '\');"  ><span class="label label-info">' . $convertToDate . '</span></a>  <br><a class="button" href="#" onClick="getSummary(\'' . $sCurTopicID . '\', \'' . urlencode($sCurTopic) . '\', \'' . $category . '\');">' . $sCurTopic . "</a></td></tr>";
        $changeboole = false;
    } else {
         echo '<tr class="warning"><td><a href="#" onClick="getCategoryByDate(\'' . $category . '\', \'' . $convertToDate . '\');"  ><span class="label label-info">' . $convertToDate . '</span></a>  <br><a class="button" href="#" onClick="getSummary(\'' . $sCurTopicID . '\', \'' . urlencode($sCurTopic) . '\', \'' . $category . '\');">' . $sCurTopic . "</a></td></tr>";
        $changeboole = true;
    }
}

echo '   </tbody></table>';
//echo '</div></div></div>';
?>