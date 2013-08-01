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

function check_pserver_status(i) {

    $.get("php/ServerStatus.php",function(data,status){
        if (data!=1) {
            $('#serverDown').modal();
        } else if (i == 0){
            document.getElementById("hiddenButton").click();
        } else {
            $('#register').modal();
        }
    });
    
}

function resize(multiplier) {
    if (document.body.style.fontSize == "") {
        document.body.style.fontSize = "1.0em";
    }
    document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";
}
    
function check(input) {
    if (input.value != document.getElementById('password').value) {
        input.setCustomValidity('The two passwords must match.');
    } else {
        input.setCustomValidity('');
    }
}
