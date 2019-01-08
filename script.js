$(document).ready(function(){
    $('.menu').click(function(){
        $('#head-ul').toggleClass('active');
    });
    $("#briefcase").click(function(){
        $("#hint-box").slideToggle(500);
    });
});