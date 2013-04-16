<?php

require_once 'common.php';
# Get categories
$saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);

# For each category

echo '<div  class="navbar navbar-static"><div class="navbar-inner"><div class="container" style="width: auto;"><a class="brand" href="http://scify.org" target="_new"><img src="./img/scifylogo.png"  height="30" width="29"></a><a class="brand" href="http://www.scify.gr/site/en/newsum-en" target="_new">NewSum</a>';
echo '<ul class="nav" role="navigation"><li class="dropdown"><a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" >Choose Category <b class="caret"></b></a>';
echo '<ul class="dropdown-menu" role="menu" aria-labelledby="drop1">';

foreach ($saCategories as $sCurCat) {


     echo' <li role="presentation"><a role="menuitem" tabindex="-1" href="#" onClick="getCategory(\'' . $sCurCat . '\');">' . $sCurCat . "</a></li>";


    #echo '<div class="category"><a class="large" href="#" onClick="getCategory(\''.$sCurCat.'\');">'.$sCurCat."</a></div>";
}



echo '</ul>';
echo '</li></ul><a href="?lang=gr"><img src="img/gr.png" alt="Greek Flag" width=16 height=11/></a>  <a href="?lang=en"><img src="img/us.png" alt="en Flag" width=16 height=11/></a>';
echo '<br><a href="#" onClick="getElementById(\'searchDIV\').style.visibility=\'visible\';"><i class="icon-search"></i></a>  <a href="http://www.scify.gr/site/en/support-us" target="_new"><i class="icon-gift"></i></a>';
echo '</div></div></div>';

# "'.$sCurCat.'"
?>



