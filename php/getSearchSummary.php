<?php

require_once 'common.php';
require_once("lib/effectiveTLDs.inc.php");
require_once("lib/regDomain.inc.php");

# Returns the source of an HTML page favicon

function getFavIco($url) {
    $doc = new DOMDocument();
    $doc->strictErrorChecking = FALSE;
    $doc->loadHTML(file_get_contents($url));
    $xml = simplexml_import_dom($doc);
    $arr = $xml->xpath('//link[@rel="shortcut icon"]');
    return $arr[0]['href'];
}

# Read title
echo'<a class="button" href="#" onClick="getTopicsBySearch(\'' . $_GET["sKey"] . '\');"><span class="badge badge-info"><i class="icon-arrow-left"></i></span></a>';
echo "<h4>" . urldecode($_GET["title"]) . "</h4>";

// class getSummary {
//   public $sTopicID; // string
//   public $sUserSources; // string
// }

$params = new getSummary();
$params->sTopicID = $_GET["topicID"];
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
$changeboole = true;
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
            if ($changeboole) {
                echo '<tr class="info"><td>' . $text . "<br> Source: " . '<a href="' . $sourceLink . '" target="_new">' . $source . '</a></td></tr>';
                $changeboole=false;
            } else {
                echo '<tr class="warning"><td>' . $text . "<br> Source: " . '<a href="' . $sourceLink . '" target="_new">' . $source . '</a></td></tr>';
                $changeboole=true;
            }
            
//            echo '<br>' . $text . "<br> Source: " . '<a href="' . $sourceLink . '" target="_new">' . $source . "</a><br><br>";
        }
    }
}
if ($changeboole) {
    echo '<tr class="info"><td>' . $tempHTML . '</td></tr>';
} else {
    echo '<tr class="warning"><td>' . $tempHTML . '</td></tr>';
}

echo '   </tbody></table>';
?>

