// Precisa do JqueryValidation e BlockUI
$().ready( function(){

  $('#form_reset_password').validate({

    errorClass: 'text-danger font-13',
    errorElement: 'strong',
    rules:{

      email:{
        required: true,
        maxlength: 255,
        email: true
      },

      password:{
        required: true,
        minlength: 6
      },

      password_confirmation:{
        required: true,
        minlength: 6,
        equalTo: "#password"
      }

    },

    messages:{

      email:{
        required: "Informe o seu email.",
        maxlength: "Seu email parece grande demais...",
        email: "Informe um endereço de email válido."
      },

      password:{
        required: "Informe a nova senha.",
        minlength: "A nova senha deve ter no mínimo 6 caracteres."
      },

      password_confirmation:{
        required: "Confirme a nova senha.",
        minlength: "A confirmação de senha deve ter no mínimo 6 caracteres.",
        equalTo: "A confirmação da nova senha não confere."
      }

    },

    // Após validar form
    submitHandler: function(form) {
      
      $.blockUI({ 
        message: '<h4>Confirmando</h4><h4>Aguarde um instante...</h4>',
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