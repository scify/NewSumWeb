<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./index.php?lang=en" data-toggle="tooltip" title="Home page"><img src="img/logoNewSum-simple.png" alt="" width="40" height="39"></a>
            <p class="navbar-text pull-right" style="margin-top: 12px;">
                <a href="javascript:void(0);" onclick="resize(1)"><i class="icon-plus icon-white"></i></a>  
                <a href="javascript:void(0);" onclick="resize(-1)"><i class="icon-minus icon-white"></i></a><i class="icon-text-height icon-white" data-toggle="tooltip" title="Change font size"></i> 
            </p>

            <a class="navbar-text pull-right" style="margin-top: 12px;margin-right: 10px;" href="#login" data-toggle="tab" title="user login">Login</a> 


            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="menuItem"><a href="#about" data-toggle="tab" title="Info about NewSum Web">About</a></li>
                    <li class="menuItem"><a href="#contact" data-toggle="tab" title="Find out how you can contact us">Contact</a></li>
                    <li class="menuItem">
                        <ul class="nav" role="navigation">
                            <li class="dropdown">
                                <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" title="Select a news category">Choose Category <b class="caret"></b></a>
                                <ul id="categoryMenu" class="dropdown-menu" role="menu" aria-labelledby="drop1">
                                    <?php
                                        $saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);

                                        foreach ($saCategories as $sCurCat) {
                                            echo' <li role="presentation"><a role="menuitem" tabindex="-1" href="category.php?lang=' . $lang . '&categname=' . $sCurCat . ' "  id="SelectedCategory">' . $sCurCat . "</a></li>";
                                        }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="menuItem lang clearfix"> <a href="index.php?lang=gr" data-toggle="tooltip" title="Ελληνικά"><img src="img/gr.png" alt="Greek Flag" width=16 height=11 /></a>
                        <a href="index.php?lang=en" data-toggle="tooltip" title="English"><img src="img/us.png" alt="en Flag" width=16 height=11 /></a></li>

                    <li class="menuItem"><a href="http://www.scify.gr/site/en/support-us" target="_blank" data-toggle="tooltip" title="Even a small donation amount will help us offer solutions that have up to now been ...unbelievable!" ><i class="icon-gift icon-white"></i></a></li>
                    <li class="menuItem"  style="display: none"><a id="displaySearch" href="javascript:toggleSearch();" data-toggle="tooltip" title="Search for an interesting word"><i class="icon-search icon-white"></i></a></li>
                    <li class="menuItem" style="display: none"><div id="toggleSearch" style="display: none" > 
                            <form class="form-search">
                                <input type="text" class="input-small search-query">
                                <button type="submit" class="btn">Search</button>
                            </form>
                        </div>
                    </li>
            </div>
        </div>
    </div>
</div><br>