//OBSOLETE?
//////declare the namespace. All variables will exist here
//var scify = scify || {};
//
////declare a class using the revealing prototype pattern;
////All events will be assigned here.
//scify.index = function () { };
//scify.index.prototype = function () {
//
//    var Init = function () {
//
//    };
//
//        //return the public methods of the class
//    return {
//        Init: Init
//    }
//} ();
//
//function getURLParameter(name) {
//    return decodeURI(
//        (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search) || [, null])[1]
//        );
//}
//
//function getLang() {
//    //  alert(getURLParameter("lang"));ff
//
//    if (getURLParameter("lang") == "null")
//        return "gr";
//    else
//        return getURLParameter("lang");
//
//}
//
//function getCategories() {
//    initMainOutput();
//    $("#categoryMenu").load("php/getCategories.php?lang=" + getLang());
//    $("#output").html('<div class="info">No category selected.</div>');
//// todo FIXME
//
//}
//
//function initMainOutput() {
//
//    var Temphtml = '<table><caption><img src="./img/logoNewSum.png"></caption> <tbody><tr><td>';
//    if (getLang() == "gr") {
//        Temphtml = Temphtml + "Καλώς ήρθατε στο διαδικτυακό NewSum.</td></tr></tbody></table>";
//    } else {
//        Temphtml = Temphtml + "Welcome to web NewSum.</td></tr></tbody></table>";
//    }
//    $("#mainoutput").html(Temphtml);
//
//}
//
//function getCategoryByDate(sCate, sDate) {
//    //  alert(sCat);
//
//    //                document.getElementById("drop1").innerHTML= sCate+"<b class='caret'></b>";
//    $("#output").html("<div class='info'><img src='./img/loading.gif'></div>");
//
//    $("#output").load("php/getCategoryByDate.php?category=" + encodeURIComponent(sCate) + "&lang=" + getLang() + "&date=" + sDate);
//}
//
//function getCategory(sCat) {
//    //  alert(sCat);
//    document.getElementById("drop1").innerHTML = sCat + " <b class='caret'></b>";
//    initMainOutput();
//    $("#output").html("<div class='info'><img src='./img/loading.gif'></div>");
//    $("#output").load("php/getCategory.php?category=" + encodeURIComponent(sCat) + "&lang=" + getLang());
//}
//
//function getTopicsBySearch(sSearchString) {
//    initMainOutput();
//    $("#output").html("<div class='info'><img src='./img/loading.gif'></div>");
//    $("#output").load("php/getTopicsBySearch.php?searchInfo=" + encodeURIComponent(sSearchString) + "&category=" + document.getElementById("drop1").innerHTML.split(" ")[0] + "&lang=" + getLang());
//}
//
//function getSummary(sTopic, sTitle, sCategory) {
//    //   alert(encodeURIComponent(sTitle));
//    $("#mainoutput").html("<div class='info'><img src='./img/loadingNS2.gif'><br><h3>Loading...</h3></div>");
//    $("#mainoutput").load("php/getSummary.php?topicID=" + sTopic + "&lang=" + getLang() + "&category=" + sCategory
//        + "&title=" + encodeURIComponent(sTitle));
//}
//
//function getSearchSummary(sTopic, sTitle, sSearchKey) {
//    //   alert(encodeURIComponent(sTitle));
//    $("#mainoutput").html("<div class='info'><img src='./img/loadingNS2.gif'><br><h3>Loading...</h3></div>");
//    $("#mainoutput").load("php/getSearchSummary.php?topicID=" + sTopic + "&lang=" + getLang() + "&sKey=" + sSearchKey
//        + "&title=" + encodeURIComponent(sTitle));
//}

function toggleSearch() {
    var ele = document.getElementById("toggleSearch");
    var text = document.getElementById("displaySearch");
    if (ele.style.display == "block") {
        ele.style.display = "none";

    }
    else {
        ele.style.display = "block";
    }
}
            
//google analytics

(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-31632742-6', 'newsumontheweb.org');
ga('send', 'pageview');


