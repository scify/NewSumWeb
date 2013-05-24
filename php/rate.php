<?php

require_once 'common.php';

$sid = $_REQUEST["sid"];
$iRating = $_REQUEST["rating"];
if (isset($_REQUEST["userID"]))
    $sUser = $_REQUEST["userID"];
else
    $sUser = "Anonymous";

$sText = "";


$params = new getSummary();
$params->sTopicID = $sid;
$params->sUserSources = "All";
$bShouldRefresh = false;
try {
    $saSentenceInfo = splitToFirstLevelSeparator($newsum->getSummary($params)->return);
} catch (Exception $e) {
    // Should refresh
    $bShouldRefresh = true;
}


foreach ($saSentenceInfo as $sCurSentenceInfo) {

 $sSecondLVLsplit = splitToSecondLevelSeparator($sCurSentenceInfo);
    
    $sText = $sText . $sSecondLVLsplit[0];
}
$stringData = $sSep. $sText. $sSep. $iRating. $sSep. $sUser. $sSep.'\n';

echo $stringData;
//echo $sSep . $sText . $sSep . $iRating . $sSep . $sUser . $sSep;
//$saVals = array($sSep, $sText, $sSep, $iRating, $sSep, $sUser, $sSep);
file_put_contents("./ratingsNew.txt", $stringData, FILE_APPEND);
?>