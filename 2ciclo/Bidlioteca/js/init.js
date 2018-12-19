/* global $ */ 
/* global slider */ 
(function($){ 
  $(function(){ 
    $('.modal-trigger').leanModal();
    $(".button-collapse").sideNav({
        menuWidth: 200
    }); 
    $('.collapsible').collapsible(); 
    $(".button-collapse").sideNav();
  }); 
   
    // end of document ready 
})(jQuery); // end of jQuery name space
//----------Botao responsivo
      $(document).ready(function(){
        $(".button-collapse").sideNav();
      });



