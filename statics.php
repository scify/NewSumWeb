<?php

function fill_carousel($lang){
    switch ($lang){
        default:
        case "gr":
            echo '
                <div class="item active">
                    <img src="img/carousel/newsumontheweb1.png" alt="">
                    <div class="carousel-caption">
                        <h4>Καλώς ήλθατε στο NewSum on the web</h4>
                        <p><i>"Μία περίληψη από πολλές πηγές για κάθε είδηση...δωρεάν."</i></p>                                            
                    </div>
                </div>
                <div class="item">
                    <img src="img/carousel/newsumontheweb2.png" alt="">
                    <div class="carousel-caption">
                        <h4>Ενισχύουμε την πολυφωνία στην ενημέρωση</h4>
                        <p>Γρήγορη, πολυφωνική ενημέρωση, όποτε τη χρειάζεστε!</p>
                    </div>
                </div>
                <div class="item">
                    <img src="img/carousel/newsumontheweb3.png" alt="" usemap="#Qrmap"> 
                     <map name="Qrmap">
                        <area shape="rect" coords="448,0,672,226" title="Google Play" href="https://play.google.com/store/apps/details?id=gr.scify.newsum.ui" target="_blank">
                    </map>
                    <div class="carousel-caption">
                        <h4>Η μοναδική εφαρμογή NewSum για android</h4>
                        <p>Κατεβάστε τη στο <a href="https://play.google.com/store/apps/details?id=gr.scify.newsum.ui" target="_blank">Google Play</a> για το smartphone / tablet σας.</p>
                    </div>
                </div>
                <div class="item">
                    <img src="img/carousel/newsumontheweb4.png" alt="" usemap="#Projectmap">
                    <map name="Projectmap">
                        <area shape="rect" coords="372,13,581,213" title="SciFY" href="http://www.scify.gr/site/el/" target="_blank">
                        <area shape="rect" coords="693,21,868,85" title="PServer" href="http://www.scify.gr/site/el/pserver-el" target="_blank">
                        <area shape="rect" coords="804,100,895,189" title="NewSum" href="http://www.scify.gr/site/el/newsum-el" target="_blank">
                        <area shape="rect" coords="612,139,758,205" title="iCSee" href="http://www.scify.gr/site/el/icsee-gr" target="_blank">
                    </map>
                    <div class="carousel-caption">
                        <h4>Φέρνουμε κορυφαία τεχνολογία πληροφορικής στην καθημερινή ζωή όλων, δωρεάν!</h4>
                        <p><a href="http://www.scify.gr/site/el/" target="_blank" style="color: whitesmoke;">Δείτε κι άλλα εκπληκτικά projects μας στο site μας.</a></p>
                    </div>
                </div>';
            break;
        case "en":
            echo '
                <div class="item active">
                    <img src="img/carousel/newsumontheweb1.png" alt="">
                    <div class="carousel-caption">
                        <h4>Welcome to NewSum on the web</h4>
                        <p><i>"One news summary from many news sources...for free."</i></p>                                            
                    </div>
                </div>
                <div class="item">
                    <img src="img/carousel/newsumontheweb2.png" alt="">
                    <div class="carousel-caption">
                        <h4>We reinforce pluralism in news coverage</h4>
                        <p>Get informed fast, without losing the pluralism!</p>
                    </div>
                </div>
                <div class="item">
                    <img src="img/carousel/newsumontheweb3.png" alt="" usemap="#Qrmap"> 
                     <map name="Qrmap">
                        <area shape="rect" coords="448,0,672,226" title="Google Play" href="https://play.google.com/store/apps/details?id=gr.scify.newsum.ui" target="_blank">
                    </map>
                    <div class="carousel-caption">
                        <h4>The unique NewSum android app: news on the go</h4>
                        <p>Download NewSum at <a href="https://play.google.com/store/apps/details?id=gr.scify.newsum.ui" target="_blank">Google Play</a></p>
                    </div>
                </div>
                <div class="item">
                    <img src="img/carousel/newsumontheweb4.png" alt="" usemap="#Projectmap">
                    <map name="Projectmap">
                        <area shape="rect" coords="372,13,581,213" title="SciFY" href="http://www.scify.gr/site/en/" target="_blank">
                        <area shape="rect" coords="693,21,868,85" title="PServer" href="http://www.scify.gr/site/en/pserver-en" target="_blank">
                        <area shape="rect" coords="804,100,895,189" title="NewSum" href="http://www.scify.gr/site/en/newsum-en" target="_blank">
                        <area shape="rect" coords="612,139,758,205" title="iCSee" href="http://www.scify.gr/site/en/icsee-en" target="_blank">
                    </map>
                    <div class="carousel-caption">
                        <h4>We bring cutting-edge technology into everyday life for free</h4>
                        <p>Check out more of our awesome projects <a href="http://www.scify.gr/site/en/" target="_blank">at our site.</a></p>
                    </div>
                </div>';
            break;
    }
}

function create_about_tab($lang){
    switch ($lang){
        default:
        case "gr":
            echo '
                <div class="tab-pane fade" id="about">
                    <div class="hero-unit">
                        <h4> Τι είναι το NewSum;</h4>
                        <p> Tο NewSum δημιουργεί αυτόματα ένα περιληπτικό κείμενο για κάθε είδηση, αντλώντας δεδομένα από πολλές ειδησεογραφικές πηγές!
                            Σας δίνει τα βασικά σημεία (κάτι σαν “tweets”) όλων των πληροφοριών που θα μαθαίνατε αν μπορούσατε να διαβάσετε όλα τα άρθρα 
                            από όλες τις πηγές που χρησιμοποιείτε για την ενημέρωσή σας (ή που θα θέλατε να είχατε το χρόνο να χρησιμοποιείτε για την ενημέρωσή σας ...). 
                            Αξιοποιώντας προηγμένη τεχνολογία τεχνητής νοημοσύνης, το NewSum συνοψίζει την είδηση χωρίς να επαναλαμβάνει πληροφορία, χωρίς να παραλείπει 
                            κρίσιμα σημεία της. Και επιπλέον έχετε πάντα πρόσβαση στις πηγές των ειδήσεων.</p>
                    </div>
                </div>';
            break;
        case "en":
            echo '
                <div class="tab-pane fade" id="about">
                    <div class="hero-unit">
                        <h4> What is NewSum?</h4>
                        <p> NewSum automatically summarizes information 
                            from many sources and combines them in a single text.<br>
                            It gives you the main points (something like “tweets”) 
                            of all the different information that you would get if 
                            you read all the articles from the sources you visit 
                            (or that you would like to have time to visit...)
                            <br>With the use of cutting-edge artificial intelligence technology, news are summarised and all repeated information is not duplicated.
                            What is more, you always have access to the news sources.</p>
                    </div>
                </div>';
            break;
    }
    
    function create_contact_tab(){
        echo '
            <div class="tab-pane fade" id="contact">
                <div class="row-fluid">
                    <div class="span4">
                        <div class="hero-unit">  
                            <address>
                                <p class="text-center">   <a href="http://www.scify.gr/site/en/" target="_blank"><img src="img/logo trans_singleline_small.png" title="SciFY.org" width="50%" height="50%"></a></p>
                                <p class="text-center">  <strong> SCIENCE FOR YOU NPO </strong></p>
                                <p class="text-center">   4, I. Varvaki str., Gizi, 114 74 <br>Athens - Greece</p><br>
                                <p class="text-center"> 
                                    <abbr title="Phone">P: </abbr> +30 211 0149 973 <br>
                                    <abbr title="Fax">F: </abbr>+30 211 0124 418<br>
                                    <abbr title="e-mail">E: </abbr><a href="mailto:#">info @ scify.org</a>
                                </p>
                                            <!--<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">NewSumWeb Feedback</h4>
                                                        </div>
                                                        <div class="modal-body">

                                                            <iframe width="640" height="1120" frameborder=0  marginheight="0" marginwidth="0"  src="https://docs.google.com/spreadsheet/viewform?formkey=dE5FTFJnMk40MnFXaEVsRmYtMkdENXc6MA#gid=0"></iframe>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div> /.modal-content 
                                                </div> /.modal-dalog 
                                            </div> /.modal 

                                            <a data-toggle="modal" href="#myModal" class="btn btn-primary">Give us a feedback</a>-->
                            </address>
                        </div>
                    </div>
                    <div class="span3">
                        <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=el&amp;geocode=&amp;q=%CE%99%CF%89%CE%AC%CE%BD%CE%BD%CE%BF%CF%85+%CE%92%CE%B1%CF%81%CE%B2%CE%AC%CE%BA%CE%B7+4+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1+114+74,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=62.99906,135.263672&amp;ie=UTF8&amp;hq=&amp;hnear=%CE%99%CF%89%CE%AC%CE%BD%CE%BD%CE%BF%CF%85+%CE%92%CE%B1%CF%81%CE%B2%CE%AC%CE%BA%CE%B7+4,+%CE%91%CE%B8%CE%AE%CE%BD%CE%B1,+%CE%9A%CE%B5%CE%BD%CF%84%CF%81%CE%B9%CE%BA%CF%8C%CF%82+%CE%A4%CE%BF%CE%BC%CE%AD%CE%B1%CF%82+%CE%91%CE%B8%CE%B7%CE%BD%CF%8E%CE%BD,+%CE%95%CE%BB%CE%BB%CE%AC%CE%B4%CE%B1&amp;t=m&amp;ll=37.993525,23.743687&amp;spn=0.023675,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
                    </div>
                </div>
            </div>';
    }
}

?>
