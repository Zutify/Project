
$(document).ready(function () {
    $('#btn-side-menu').on('click', function(){
      $( "body" ).append( "<div id='sideMenu' style='width:70%; position: absolute; left:30%; background-color: #f8f9fa; height: 100%; display: none; z-index: 10000; top: 0px;'></div>");
      $( "body" ).append( "<div id='side-menu-noclick' style='height: 100%; width:30%; background-color: rgba(0,0,0, .3); z-index: 10000; position: absolute; top: 0px; left: 0px; display: none;'></div>" );
      $('#btn-side-menu').fadeOut();
      $('#sideMenu').hide().load( '?page=sideMenu', '', () => {
        $('#sideMenu, #side-menu-noclick').fadeIn("slow");
      });
    });
  });

