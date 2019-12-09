$(document).ready(function () {
        $('#side-menu-noclick').click(function(){
            document.getElementById('btn-side-menu').style.display = "block";
            $.when($('#sideMenu').fadeOut("slow")).done(function() {
                 $('#sideMenu').detach()
                 $('#side-menu-noclick').detach()
                 });
        });
        $('#btn-side-menuClose').click(function(){
            document.getElementById('btn-side-menu').style.display = "block";
            $.when($('#sideMenu').fadeOut("slow")).done(function() {
                 $('#sideMenu').detach()
                 $('#side-menu-noclick').detach()
                 });
        });
    });