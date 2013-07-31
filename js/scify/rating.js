/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function s4() {
    return Math.floor((1 + Math.random()) * 0x10000)
    .toString(16)
    .substring(1);
};

function guid() {
    return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
        s4() + '-' + s4() + s4() + s4();
}

$(function() {
    $.fn.raty.defaults.path = 'img/rating/';



    $('#rating-star').raty({
        click: function(score, evt) {

            var sUserID;
            if (!$.cookie("userID")) {
                sUserID = "NewSumWeb" + guid();

                $.cookie("userID", sUserID);
            }
            else
                sUserID = $.cookie("userID");



            $.post(
            "php/rate.php", {'sid': $("#summaryid").html(), 'rating':score, 'userID': sUserID}, function (data) {  alert('Thank you for your rating.'); }
        );

            $("#ratingDiv").fadeOut("slow"); 


        },
        hints: ['1', '2', '3', '4', '5']
    });

});