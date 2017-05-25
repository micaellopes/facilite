// Precisa do JqueryValidation e BlockUI
$(document).ready( function(){

  /**
   * Se existir elementos (sessão) erro-alterar-senha/senha-atual-incorreta inicializa o modal para exibir mensagem
   */
  if ($(".erro-alterar-senha, #erro-atualizar").length){
    $('#modalAlterarSenha').modal('show');
  }

  /**
   * Se existir elementos (sessão) erro-comentar inicializa o modal para exibir mensagem
   */
  if ($("#erro-comentar").length){
    $('#modalEscreverComentario').modal('show');
  }

});