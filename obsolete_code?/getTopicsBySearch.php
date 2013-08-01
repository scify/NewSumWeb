<?php

require_once 'common.php';
#$params=new getCategorySources();
$searchInfo = $_GET["searchInfo"];
#$category="Europe";
// $params->sCategory="Αθλητικά";
// $saSources=$newsum->getCategorySources($params)->return;

$paramsTitles = new getTopicIDsByKeyword();
$paramsTitles->sUserSources = "All";
$paramsTitles->sKeyword = $searchInfo;
$saTopicIDs = splitToFirstLevelSeparator($newsum->getTopicIDsByKeyword($paramsTitles)->return);
$saTempTopicIDs = $newsum->getTopicIDsByKeyword($paramsTitles)->return;

$paramsTitles = new getTopicTitlesByIDs();
$paramsTitles->sTopicIDs = $saTempTopicIDs;
$saTopicsByKey = splitToFirstLevelSeparator($newsum->getTopicTitlesByIDs($paramsTitles)->return);

echo '<table class="table table-striped"><tbody>';

 if (strcmp ($saTopicsByKey[0] , "" )==0) {
        echo '<tr class="info"><td> No Results</td></tr>';
    }else{


#TODO: Check the date 
$changeboole = true;
for ($i = 0; $i <= sizeof($saTopicIDs); $i++) {

    $sCurTopicID = $saTopicIDs[$i];
    $sCurTopic = $saTopicsByKey[$i];
   
    $category = $_GET["category"];
    if ($changeboole) {
        echo '<tr class="info"><td><a class="button" href="#" onClick="getSearchSummary(\'' . $sCurTopicID . '\', \'' . urlencode($sCurTopic) . '\', \'' . $searchInfo . '\');">' . $sCurTopic . "</a></td></tr>";
        $changeboole = false;
    } else {
        echo '<tr class="warning"><td><a class="button" href="#" onClick="getSearchSummary(\'' . $sCurTopicID . '\', \'' . urlencode($sCurTopic) . '\', \'' . $searchInfo . '\');">' . $sCurTopic . "</a></td></tr>";
        $changeboole = true;
    }
}
    }

echo '   </tbody></table>';
?>