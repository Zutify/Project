$(document).ready(function () {
    $('#btn-side-menu').on('click', function(){
      $( "body" ).append( "<div id='side-menu-noclick' style='height: 100%; width:30%; background-color: rgba(0,0,0, .3); z-index: 10000; position: absolute; top: 0px; left: 0px; display: none;'></div>" );
      $('#btn-side-menu').hide();
      $('#sideMenu').hide().load( 'page/sideMenu.php', '', () => {
        $('#sideMenu, #side-menu-noclick').fadeIn("slow");
      });
    });
  });