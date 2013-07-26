<div class="navbar-fixed-top">
    <div class="navbar navbar-static-top navbar-inverse">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="./index.php" title="Αρχική σελίδα"><img src="img/logoNewSum-simple.png" alt="" width="40" height="39"></a>
                <p class="navbar-text pull-right" style="margin-top: 12px;">
                    <a href="javascript:void(0);" onclick="resize(1)"><i class="icon-plus icon-white"></i></a>  
                    <a href="javascript:void(0);" onclick="resize(-1)"><i class="icon-minus icon-white"></i></a><i class="icon-text-height icon-white" data-toggle="tooltip" title="Change font size"></i> 
                </p>
                <div class="nav-collapse collapse">

                    <div class="nav-collapse collapse ">
                        <ul class="nav">
                            <li class="menuItem"><a href="#about" data-toggle="tab" title="Info about NewSum Web">About</a></li>
                            <li class="menuItem"><a href="#contact" data-toggle="tab" title="Find out how you can contact us">Contact</a></li>
                            <li class="menuItem lang clearfix"> <a href="index.php?lang=gr" data-toggle="tooltip" title="Ελληνικά"><img src="img/gr.png" alt="Greek Flag" width=16 height=11 /></a>
                                <a href="index.php?lang=en" data-toggle="tooltip" title="English"><img src="img/us.png" alt="en Flag" width=16 height=11 /></a></li>

                            <li class="menuItem"><a href="http://www.scify.gr/site/en/support-us" target="_blank" data-toggle="tooltip" title="Even a small donation amount will help us offer solutions that have up to now been ...unbelievable!" ><i class="icon-gift icon-white"></i></a></li>
                        </ul>
                        <?php
                            if (!isset($_SESSION["USER_ID"])){
                                        echo '<a class="navbar-text pull-right" style="margin-top: 12px;margin-right: 10px;" href="#register" data-toggle="modal" title="user login">Register</a>';
                            }
                            else {
                                echo '
                                    <p class="navbar-text pull-right" style="margin-top: 12px;margin-right: 12px;">
                                        Welcome '.$_SESSION["USER_ID"].' <a class="navbar-text" href="index.php?logout">Logout</a> 
                                    </p>';
                            }
                            if (!isset($_SESSION["USER_ID"])){
                                echo '
                                    <form class="form-horizontal pull-right" style="margin-top: 14px;margin-right: 20px;" method="POST" action="./index.php">
                                        <input type="email" title="E-mail" placeholder="E-mail" name="login" class="input-medium" required>
                                        <input type="password" pattern="[^\']{6,18}" title="6-18 characters" name="pass" placeholder="Password" class="input-medium" required>
                                        <button type="submit" class="btn btn-small btn-primary" style="margin-top: -1.5px;">Login</button>
                                    </form>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-static-top navbar-inverse"> <!--separate navbar so that they can have different bg color-->
        <div class="navbar-inner container-fluid">
            <ul class="nav">		      
                <?php
                    $saCategories=splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);
                    $categories=array();
                    foreach ($saCategories as $sCurCat) {
                        $categories[$lang.'.'.$sCurCat]=0;
                        echo'<li><a href="category.php?lang='.$lang.'&categname='.$sCurCat.'"id="SelectedCategory">'.$sCurCat."</a></li>";
                    }
                    setFeatures($categories);
                ?>
            </ul>
        </div>
    </div>
</div><br>
<?php
    if (isset($_GET["failedLogin"])){
        echo '<div class="alert" style="position:absolute;margin-top:20px;z-index:2;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Failed login</strong> Please check your credentials
          </div>';
    }
?>
<script type="text/javascript">
    function resize(multiplier) {
        if (document.body.style.fontSize == "") {
            document.body.style.fontSize = "1.0em";
        }
        document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
    }
</script>
 <script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('The two passwords must match.');
        } else {
            input.setCustomValidity('');
       }
    }
</script>