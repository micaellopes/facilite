// Precisa do JqueryValidation e BlockUI
$().ready( function(){

  $('#form_comentario').validate({

    errorClass: 'text-danger font-13',
    errorElement: 'strong',
    rules:{

      comentario:{
        required: true,
        minlength: 4,
        maxlength: 40
      }

    },

    messages:{

      comentario:{
        required: "Escreva algo.",
        minlength: "Mínimo de 4 caracteres.",
        maxlength: "Máximo de 40 caracteres."
      }

    },

    // Após validar form
    submitHandler: function(form) {

      $('#modalEscreverComentario').modal('hide');
      
      $.blockUI({ 
        message: '<h4>Enviando comentário</h4><h4>Aguarde um instante...</h4>',
        fadeIn: 300,
        timeout: 1500,
        css: { zIndex: 20000, border: 'none', padding: '20px', backgroundColor: '#FFFFFF', '-webkit-border-radius': '20px', 
        '-moz-border-radius': '20px', color: '#024D62' }
      }); 

      form.submit();
    }

  });

});