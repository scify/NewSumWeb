<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="./index.php" data-toggle="tooltip" title="Αρχική σελίδα"><img src="img/logoNewSum-simple.png" alt="" width="40" height="39"></a>
            <p class="navbar-text pull-right" style="margin-top: 12px;">
                <a href="javascript:void(0);" onclick="resize(1)"><i class="icon-plus icon-white"></i></a>  
                <a href="javascript:void(0);" onclick="resize(-1)"><i class="icon-minus icon-white"></i></a><i class="icon-text-height icon-white" data-toggle="tooltip" title="Άλλαξε το μέγεθος των γραμμάτων"></i>
            </p>
            
            <?php
                if (!isset($_SESSION["USER_ID"])){
                            echo '<a class="navbar-text pull-right" style="margin-top: 12px;margin-right: 10px;" href="#register" data-toggle="modal" title="Είσοδος χρήστη">Εγγραφή χρήστη</a> ';
                }
                else {
                    echo '
                        <p class="navbar-text pull-right" style="margin-top: 12px;margin-right: 12px;">
                            Καλωσήρθες '.$_SESSION["USER_ID"].' <a class="navbar-text" href="index.php?logout">Αποσύνδεση</a> 
                        </p>';
                }
            ?>
                        
            <div class="nav-collapse collapse">

                <ul class="nav">
                    <li class="menuItem"><a href="#about" data-toggle="tab" title="Πληροφορίες σχετικά με το NewSum Web.">Σχετικά</a></li>
                    <li class="menuItem"><a href="#contact" data-toggle="tab" title="Επικοινωνήστε μαζί μας">Επικοινωνία</a></li>
                    <li class="menuItem">
                        <ul class="nav" role="navigation">
                            <li class="dropdown">

                                <a id="drop1" href="#" role="button" class="dropdown-toggle" data-toggle="dropdown" title="Επιλέξτε κατηγορία ειδήσεων">Επιλέξτε κατηγoρία <b class="caret"></b></a>

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
                    
                    <li class="menuItem"><a href="http://www.scify.gr/site/el/support-us-el/help-us-el" target="_blank" data-toggle="tooltip" title="Ακόμα και ένα μικρό ποσό δωρεάς θα μας βοηθήσει να προσφέρουμε λύσεις... απίστευτες μέχρι σήμερα" ><i class="icon-gift icon-white"></i></a></li>
                    <?php
                        if (!isset($_SESSION["USER_ID"])){
                            echo '
                                <li><form class="form-horizontal" style="margin-top: 14px;margin-left: 150px;" action="" method="POST">
                                    <input type="email" title="Λογαριασμός ηλεκτρονικού ταχυδρομείου" placeholder="E-mail" name="login" class="input-medium" required>
                                    <input type="password" pattern="[^\']{6,18}" title="6-18 χαρακτήρες" placeholder="κωδικός" name="pass" class="input-medium" required>
                                    <button type="submit" class="btn btn-primary" style="margin-top: -1.5px;">Είσοδος</button>
                                </form></li>';
                        }
                    ?>
            </div> 
        </div>
    </div>
</div><br>
<script type="text/javascript">
    function resize(multiplier) {
        if (document.body.style.fontSize == "") {
            document.body.style.fontSize = "1.0em";
        }
        document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
    }
</script>
