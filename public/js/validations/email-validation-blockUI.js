// Precisa do JqueryValidation e BlockUI
$().ready( function(){

  $('#form_email_confirm').validate({

    errorClass: 'text-danger font-13',
    errorElement: 'strong',
    rules:{

      email:{
        required: true,
        maxlength: 255,
        email: true
      }

    },

    messages:{

      email:{
        required: "Informe o seu email.",
        maxlength: "Seu email parece grande demais...",
        email: "Informe um endereço de email válido."
      }

    },

    // Após validar form
    submitHandler: function(form) {
      
      $.blockUI({ 
        message: '<h4>Enviando link de redefinição</h4><h4>Aguarde um instante...</h4>',
        // showOverlay: false,
        fadeIn: 300,
        // fadeOut: 500,
        timeout: 30000,
        css: { border: 'none', padding: '20px', backgroundColor: '#FFFFFF', '-webkit-border-radius': '20px', 
        '-moz-border-radius': '20px', color: '#024D62' }
      }); 

      form.submit();
    }

  });

});