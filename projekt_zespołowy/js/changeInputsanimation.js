$(document).ready(function () {
    $("#changeInputs").on('click', function(){
        document.getElementById("changeInputs").style.color = "#007bff";
    	AnimateRotate(180);
    })
});

function AnimateRotate(d){
    var elem = $("#changeInputs");

    $({deg: 0}).animate({deg: d}, {
        duration: 500,
        step: function(now){
            elem.css({
                 transform: "rotate(" + (now + 90) + "deg)"
            });
        }
    }).promise().done(function(){
        document.getElementById("changeInputs").style.color = "black";
        });
}