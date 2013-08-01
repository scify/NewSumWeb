<div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="./index.php" title="Αρχική σελίδα"><img src="img/navbar/logoNewSum-simple.png" alt="" width="40" height="39"></a>
            <p class="navbar-text pull-right" style="margin-top: 12px;">
                <a href="javascript:void(0);" onclick="resize(1)"><i class="icon-plus icon-white"></i></a>  
                <a href="javascript:void(0);" onclick="resize(-1)"><i class="icon-minus icon-white"></i></a><i class="icon-text-height icon-white" data-toggle="tooltip" title="Άλλαξε το μέγεθος των γραμμάτων"></i>
            </p>
            <div class="nav-collapse collapse">

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="menuItem"><a href="#about" data-toggle="tab" title="Πληροφορίες σχετικά με το NewSum Web.">Σχετικά</a></li>
                        <li class="menuItem"><a href="#contact" data-toggle="tab" title="Επικοινωνήστε μαζί μας">Επικοινωνία</a></li>
                        <li class="menuItem lang clearfix"> <a href="index.php?lang=gr" data-toggle="tooltip" title="Ελληνικά"><img src="img/navbar/gr.png" alt="Greek Flag" width=16 height=11 /></a>
                            <a href="index.php?lang=en" data-toggle="tooltip" title="English"><img src="img/navbar/us.png" alt="en Flag" width=16 height=11 /></a></li>

                        <li class="menuItem"><a href="http://www.scify.gr/site/el/support-us-el/help-us-el" target="_blank" data-toggle="tooltip" title="Ακόμα και ένα μικρό ποσό δωρεάς θα μας βοηθήσει να προσφέρουμε λύσεις... απίστευτες μέχρι σήμερα" ><i class="icon-gift icon-white"></i></a></li>
                    </ul>
                    <ul class="nav pull-right">
                      
                        <?php
                        if (!isset($_SESSION["USER_ID"])) {
                            echo '
                                <li>
                                <form class="form-horizontal " id="loginForm" style="margin-top: 20px;margin-right: 20px; margin-bottom: 0px;" action="./index.php" method="POST">
                                    <input type="email" title="Λογαριασμός ηλεκτρονικού ταχυδρομείου" placeholder="E-mail" name="login" class="input-medium" required  style="height: 15px; margin-top: 5px;"><br class="hidden-desktop">
                                    <input type="password" pattern="[^\']{6,18}" title="6-18 χαρακτήρες" placeholder="κωδικός" name="pass" class="input-medium" required  style="height: 15px; margin-top: 5px;"><br class="hidden-desktop">
                                    <button type="button" action="" onclick="check_pserver_status(0)" class="btn btn-small btn-primary" title="Είσοδος χρήστη">Είσοδος</button>
                                    <button type="submit" style="display:none" id="hiddenButton"></button>
                                    <a class="btn btn-small btn-info"  href="javascript:void" onclick="check_pserver_status(1)" title="Εγγραφή χρήστη">Εγγραφή χρήστη</a>
                                </form></li>';
                        } else {
                            echo '
                                <li><p class="navbar-text pull-right" style="margin-top: 12px;margin-right: 12px;">
                                    Καλωσήρθες ' . $_SESSION["USER_ID"] . ' <a class="navbar-text" href="index.php?logout">Αποσύνδεση</a> 
                                </p></li>';
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
    <div class="navbar-inner container-fluid">
        <ul class="nav">		      
            <?php
            $saCategories = splitToFirstLevelSeparator($newsum->getCategories(new getCategories())->return);
            $categories = array();
            foreach ($saCategories as $sCurCat) {
                $categories[$lang . '.' . $sCurCat] = 0;
                echo'<li><a href="category.php?lang=' . $lang . '&categname=' . $sCurCat . '"id="SelectedCategory">' . $sCurCat . "</a></li>";
            }
            setFeatures($categories);
            ?>
        </ul>
    </div>
</div><br>
<?php
if (isset($_GET["failedLogin"])) {
    echo '<div class="alert" style="position:absolute;margin-top:20px;z-index:2;">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Αποτυχία σύνδεσης</strong> Παρακαλώ ελέγξτε τα στοιχεία σας
          </div>';
}
