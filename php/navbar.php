<?php

require_once 'common.php';
$lang = $_GET["lang"];

if ($lang == "") {
    $lang = 'gr';
}
echo' <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                 <div class="container-fluid">
                     <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                     <a class="brand" href="./newindex.php" data-toggle="tooltip" title="Go to home page."><img src="img/logoNewSum-simple.png" alt="" width="40" height="39"></a>
                     <div class="nav-collapse collapse">
                         <ul class="nav">
                            <li class="active brand" ><a href="./newindex.php" data-toggle="tooltip" title="Go to home page.">NewSumWeb</a></li>
                             <li><a href="#about" data-toggle="tab" data-toggle="tooltip" title="Info about the NewSum Web.">About</a></li>
                             <li><a href="#contact" data-toggle="tab" data-toggle="tooltip" title="Find how you can contact with us.">Contact</a></li>
                            <li>

                                 <ul class="nav" role="navigation">
                                     <li class="dropdown">
                                     <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="Choose a category for news.">Choose Category <b class="caret"></b></a>
                                         <ul id="categoryMenu" class="dropdown-menu" role="menu" aria-labelledby="drop1">';



$saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);



foreach ($saCategories as $sCurCat) {

    echo' <li role="presentation"><a role="menuitem" tabindex="-1" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . ' "  id="SelectedCategory">' . $sCurCat . "</a></li>";
}


echo'  </ul>
                                     </li>
                                 </ul>
                             </li>
                         

                     
                    <li> <a href="newindex.php?lang=gr" data-toggle="tooltip" title="Ελληνικά"><img src="img/gr.png" alt="Greek Flag" width=16 height=11/></a></li>
                    <li> <a href="newindex.php?lang=en" data-toggle="tooltip" title="English"><img src="img/us.png" alt="en Flag" width=16 height=11/></a></li>
                   
                     <li><a href="http://www.scify.gr/site/en/support-us" target="_new" data-toggle="tooltip" title="Make us a donation and help us to afford the best services." ><i class="icon-gift icon-white"></i></a></li>
                          <li><a id="displaySearch" href="javascript:toggleSearch();" data-toggle="tooltip" title="Search an interesting word."><i class="icon-search icon-white"></i></a></li>
                             <li><div id="toggleSearch" style="display: none" > 
                                    <form class="form-search">
                                         <input type="text" class="input-small search-query">
                                         <button type="submit" class="btn">Search</button>
                                    </form>
                                 </div></li>
                                 </div>
                         
</ul>
                 </div>
             </div>
         </div>';
?>