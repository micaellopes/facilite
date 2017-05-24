// Precisa do JqueryValidation e BlockUI
$().ready( function(){

  $('#form_solicitar').validate({

    errorClass: 'text-danger font-13',
    errorElement: 'strong',
    rules:{

      data:{
        required: true
      },

      horario:{
        required: true,
        minlength: 5,
        maxlength: 5
      },

      numero:{
        required: true,
        minlength: 15,
        maxlength: 15
      },

      mensagem:{
        required: true,
        maxlength: 255
      }

    },

    messages:{

      data:{
        required: "Informe uma data desejada."
      },

      horario:{
        required: "Informe um horário desejado.",
        minlength: "Formato inválido.",
        maxlength: "Formato inválido."
      },

      numero:{
        required: "Informe seu número de telefone.",
        minlength: "Mínimo de 11 caracteres.",
        maxlength: "Máximo de 11 caracteres."
      },

      mensagem:{
        required: "Digite uma mensagem.",
        maxlength: "Máximo de 255 caracteres."
      }


    },

    // Após validar form
    submitHandler: function(form) {

      $('#modalSolicitarServico').modal('hide');
      
      $.blockUI({ 
        message: '<h4>Enviando solicitação de serviço</h4><h4>Aguarde um instante...</h4>',
        // showOverlay: false,
        fadeIn: 300,
        // fadeOut: 500,
        timeout: 30000,
        css: { zIndex: 20000, border: 'none', padding: '20px', backgroundColor: '#FFFFFF', '-webkit-border-radius': '20px', 
        '-moz-border-radius': '20px', color: '#024D62' }
      }); 

      form.submit();
    }

  });

});