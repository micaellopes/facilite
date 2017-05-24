// Precisa do JqueryValidation e BlockUI
$(document).ready( function(){
  
  /**
   * Se existir elemento (sessão) senha-alterada inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#senha-alterada").length){
    $.blockUI({ 

      // message: '<h4><span class="green-third glyphicon glyphicon-ok-sign" style="font-size: 22px;"></span>Senha alterada com sucesso!</h4>',
      message: '<span style="font-size: 20px;">Senha alterada com sucesso!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
        // height: '100px',
        top: 'auto',
        right: '20px',
        bottom: '20px',
        left: 'auto',
        border: 'none',
        padding: '10px',
        backgroundColor: '#5BB400',
        '-webkit-border-radius': '5px', 
        '-moz-border-radius': '5px',
        color: '#FFFFFF' }
    });
  }

});