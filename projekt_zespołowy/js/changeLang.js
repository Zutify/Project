$(function () {

  //Zmiana języka
  function langButtonListen() {
    $('#switch-lang').click(function (event) {
      event.preventDefault();
      $('[lang="en"]').toggle();
      $('[lang="pl"]').toggle();
      // Zmiana języka w cookie
      if ($.cookie('lang') === 'pl') {
        $.cookie('lang', 'en');
      } else {
        $.cookie('lang', 'pl');
      }
    });
  }

  // Sprawdzamy czy cookie już istnieje
  if ($.cookie('lang')) {
    var lang = $.cookie('lang');
    if (lang === 'pl') {
      $('[lang="en"]').hide();
      langButtonListen();
    } else {
      $('[lang="pl"]').hide();
      langButtonListen();
    }
  }else{
    $('[lang="en"]').hide();
    $.cookie('lang', 'pl');
    langButtonListen();
  } 
});