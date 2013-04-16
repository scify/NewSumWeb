<?php
require_once("NewSumFreeService.php");

if (isset($_GET["lang"]))
  $lang = $_GET["lang"];
else
  $lang = "gr";
//print "Lang is $lang";

$sourceUrls= array(
  "en" => "http://143.233.226.97:60001/NewSumFreeService/NewSumFreeService?wsdl", 
  "gr"  => "http://143.233.226.97:60002/NewSumFreeService/NewSumFreeService?wsdl");

$newsum = new NewSumFreeService($wsdl=$sourceUrls[$lang]);
# Get First LevelSeparator
$sSep = $newsum->getFirstLevelSeparator(new getFirstLevelSeparator())->return;
// echo "<div>Read field separator: ".$sSep."\n</div>";

# Get Second Level Separator
$sSecoSep = $newsum->getSecondLevelSeparator(new getSecondLevelSeparator())->return;
// echo "<div>Read sentence separator: ".$sSentSep."\n</div>";

# Get Second Level Separator
$sThirSep = $newsum->getThirdLevelSeparator(new getThirdLevelSeparator())->return;
// echo "<div>Read sentence separator: ".$sSentSep."\n</div>";


function splitToFirstLevelSeparator($sStr) {
  global $sSep;
  return preg_split("\"$sSep\"", $sStr);
}

function splitToSecondLevelSeparator($sStr) {
  global $sSecoSep;
  return preg_split("\"$sSecoSep\"", $sStr);
}

function splitToThirdLevelSeparator($sStr) {
  global $sThirSep;
  return preg_split("\"$sThirSep\"", $sStr);
}
?>
