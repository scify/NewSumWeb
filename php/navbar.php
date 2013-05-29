<?php

require_once 'common.php';
$lang = $_GET["lang"];

if ($lang == "") {
    $lang = 'gr';
}

if ($lang == "en") {

echo' <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                 <div class="container-fluid">
                     <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                     <a class="brand" href="./index.php" data-toggle="tooltip" title="Home page"><img src="img/logoNewSum-simple.png" alt="" width="40" height="39"></a>
      <p class="navbar-text pull-right">
              <a href="javascript:void(0);" onclick="resize(1)"><i class="icon-plus icon-white"></i></a>  
              <a href="javascript:void(0);" onclick="resize(-1)"><i class="icon-minus icon-white"></i></a><i class="icon-text-height icon-white" data-toggle="tooltip" title="Change font size"></i> 
            </p>                     
<div class="nav-collapse collapse">
                         <ul class="nav">
                             <li class="menuItem"><a href="#about" data-toggle="tab" data-toggle="tooltip" title="Info about NewSum Web">About</a></li>
                             <li class="menuItem"><a href="#contact" data-toggle="tab" data-toggle="tooltip" title="Find out how you can contact us">Contact</a></li>
                            <li class="menuItem">
                                 <ul class="nav" role="navigation">
                                     <li class="dropdown">
                                     <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="Select a news category">Choose Category <b class="caret"></b></a>
                                         <ul id="categoryMenu" class="dropdown-menu" role="menu" aria-labelledby="drop1">';



$saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);



foreach ($saCategories as $sCurCat) {

    echo' <li role="presentation"><a role="menuitem" tabindex="-1" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . ' "  id="SelectedCategory">' . $sCurCat . "</a></li>";
}


echo'  </ul>
                                     </li>
                                 </ul>
                             </li>
                         

                     
                    <li class="menuItem lang clearfix"> <a href="index.php?lang=gr" data-toggle="tooltip" title="Ελληνικά"><img src="img/gr.png" alt="Greek Flag" width=16 height=11/></a>
                    <a href="index.php?lang=en" data-toggle="tooltip" title="English"><img src="img/us.png" alt="en Flag" width=16 height=11/></a></li>
                   
                     <li class="menuItem"><a href="http://www.scify.gr/site/en/support-us" target="_new" data-toggle="tooltip" title="Even a small donation amount will help us offer solutions that have up to now been ...unbelievable!" ><i class="icon-gift icon-white"></i></a></li>
                     <li class="menuItem"  style="display: none"><a id="displaySearch" href="javascript:toggleSearch();" data-toggle="tooltip" title="Search for an interesting word"><i class="icon-search icon-white"></i></a></li>
                     <li class="menuItem" style="display: none"><div id="toggleSearch" style="display: none" > 
                                    <form class="form-search">
                                         <input type="text" class="input-small search-query">
                                         <button type="submit" class="btn">Search</button>
                                    </form>
                                 </div></li>
                                 </div>
                         
</ul>
                 </div>
             </div>
         </div><br>';
}else{
    echo' <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                 <div class="container-fluid">
                     <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                         <span class="icon-bar"></span>
                     </button>
                     <a class="brand" href="./index.php" data-toggle="tooltip" title="Αρχική σελίδα"><img src="img/logoNewSum-simple.png" alt="" width="40" height="39"></a>
                         <p class="navbar-text pull-right">
              <a href="javascript:void(0);" onclick="resize(1)"><i class="icon-plus icon-white"></i></a>  
              <a href="javascript:void(0);" onclick="resize(-1)"><i class="icon-minus icon-white"></i></a><i class="icon-text-height icon-white" data-toggle="tooltip" title="Άλλαξε το μέγεθος των γραμμάτων"></i>
            </p>
                     <div class="nav-collapse collapse">
                     
                         <ul class="nav">
                             <li class="menuItem"><a href="#about" data-toggle="tab" data-toggle="tooltip" title="Πληροφορίες σχετικά με το NewSum Web.">Σχετικά</a></li>
                             <li class="menuItem"><a href="#contact" data-toggle="tab" data-toggle="tooltip" title="Επικοινωνήστε μαζί μας">Επικοινωνία</a></li>
                            <li class="menuItem">
                                 <ul class="nav" role="navigation">
                                     <li class="dropdown">

                                     <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" data-toggle="tooltip" title="Επιλέξτε κατηγορία ειδήσεων">Επιλέξτε κατηγoρία <b class="caret"></b></a>

                                         <ul id="categoryMenu" class="dropdown-menu" role="menu" aria-labelledby="drop1">';



$saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);



foreach ($saCategories as $sCurCat) {

    echo' <li role="presentation"><a role="menuitem" tabindex="-1" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . ' "  id="SelectedCategory">' . $sCurCat . "</a></li>";
}


echo'  </ul>
                                     </li>
                                 </ul>
                             </li>
                         

                     
                    <li class="menuItem lang clearfix"> <a href="index.php?lang=gr" data-toggle="tooltip" title="Ελληνικά"><img src="img/gr.png" alt="Greek Flag" width=16 height=11/></a>
                    <a href="index.php?lang=en" data-toggle="tooltip" title="English"><img src="img/us.png" alt="en Flag" width=16 height=11/></a></li>
                   
                     <li class="menuItem"><a href="http://www.scify.gr/site/el/support-us-el/help-us-el" target="_new" data-toggle="tooltip" title="Ακόμα και ένα μικρό ποσό δωρεάς θα μας βοηθήσει να προσφέρουμε λύσεις... απίστευτες μέχρι σήμερα" ><i class="icon-gift icon-white"></i></a></li>
                     <li class="menuItem"  style="display: none"><a id="displaySearch" href="javascript:toggleSearch();" data-toggle="tooltip" title="Search for an interesting word"><i class="icon-search icon-white"></i></a></li>
                     <li class="menuItem" style="display: none"><div id="toggleSearch" style="display: none" > 
                                    <form class="form-search">
                                         <input type="text" class="input-small search-query">
                                         <button type="submit" class="btn">Search</button>
                                    </form>
                                 </div></li>
                                 </div>
                         
</ul>
                 </div>
             </div>
         </div><br><script type="text/javascript">

            function resize(multiplier) {
                if (document.body.style.fontSize == "") {
                    document.body.style.fontSize = "1.0em";
                }
                document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
            }

        </script>';
    
    
}
?>
