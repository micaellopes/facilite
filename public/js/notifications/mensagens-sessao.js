// Precisa do JqueryValidation e BlockUI
$(document).ready( function(){

  /**
   * Se existir elemento (sessão) erro-atualizar inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#erro-atualizar").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Erro ao atualizar.</span><span class="glyphicon glyphicon-remove-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        zIndex: 20000,
        width: '320px',
        top: '80px',
        right: '20px',
        bottom: 'auto',
        left: 'auto',
        border: 'none',
        padding: '10px',
        backgroundColor: '#C70000',
        '-webkit-border-radius': '5px', 
        '-moz-border-radius': '5px',
        color: '#FFFFFF' }
    });
  }

  /**
   * Se existir elemento (sessão) dados-atualizados inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#dados-atualizados").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Dados atualizados!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) categorias-atualizadas inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#categorias-atualizadas").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Categorias atualizadas!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) servicos-atualizados inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#servicos-atualizados").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Serviços atualizados!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) especialidades-atualizadas inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#especialidades-atualizadas").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Especialidades atualizadas!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) foto-atualizada inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#foto-atualizada").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Foto atualizada!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) senha-alterada inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#senha-alterada").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Senha alterada com sucesso!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) url-alterada inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#url-alterada").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Endereço do perfil alterado!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) url-alterada inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#desc-alterada").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Descrição atualizada!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) servico-solicitado inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#servico-solicitado").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Serviço solicitado!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) servico-solicitado inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#cadastro-efetuado").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Cadastro efetuado!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) servico-solicitado inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#solicitacao-deletada").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Solicitação deletada!</span><span class="glyphicon glyphicon-trash pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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

  /**
   * Se existir elemento (sessão) erro-atualizar inicializa o blockUI para exibir mensagem de erro
   */
  if ($("#erro-comentar").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Erro ao atualizar.</span><span class="glyphicon glyphicon-remove-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        zIndex: 20000,
        width: '320px',
        top: '80px',
        right: '20px',
        bottom: 'auto',
        left: 'auto',
        border: 'none',
        padding: '10px',
        backgroundColor: '#C70000',
        '-webkit-border-radius': '5px', 
        '-moz-border-radius': '5px',
        color: '#FFFFFF' }
    });
  }

  /**
   * Se existir elemento (sessão) comentario-efetuado inicializa o blockUI para exibir mensagem de sucesso
   */
  if ($("#comentario-efetuado").length){
    $.blockUI({ 
      message: '<span style="font-size: 20px;">Comentário enviado!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
      showOverlay: false,
      fadeIn: 700,
      fadeOut: 800,
      timeout: 3000,
      showOverlay: false,
      centerY: false,
      css: {
        width: '320px',
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