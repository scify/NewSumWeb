<?php

require_once 'common.php';
# Get categories
$saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);

# For each category

foreach ($saCategories as $sCurCat) {

    echo' <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onClick="getCategory(\'' . $sCurCat . '\');">' . $sCurCat . "</a></li>";
    #echo '<div class="category"><a class="large" href="#" onClick="getCategory(\''.$sCurCat.'\');">'.$sCurCat."</a></div>";
}

# "'.$sCurCat.'"
?>



