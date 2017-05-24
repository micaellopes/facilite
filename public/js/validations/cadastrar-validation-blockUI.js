// Precisa do JqueryValidation e BlockUI
$().ready( function(){

  $('#form_cadastro').validate({

    errorClass: 'text-danger font-13',
    errorElement: 'strong',
    rules:{

      name:{
        required: true,
        minlength: 4,
        maxlength: 50
      },

      email:{
        required: true,
        maxlength: 255,
        email: true
      },

      cpf:{
        required: true,
        minlength: 14,
        maxlength: 14,
      },

      tel:{
        required: true,
        minlength: 15,
        maxlength: 15,
      },

      password:{
        required: true,
        minlength: 6
      },

      password_confirmation:{
        required: true,
        minlength: 6,
        equalTo: "#password"
      },

    },

    messages:{

      name:{
        required: "Informe um nome.",
        minlength: "Mínimo de 4 caracteres permitidos.",
        maxlength: "Máximo de 50 caracteres permitidos"
      },

      email:{
        required: "Informe um email.",
        maxlength: "Seu email parece grande demais...",
        email: "Informe um endereço de email válido."
      },

      cpf:{
        required: "Informe o seu CPF.",
        minlength: "Mínimo de 11 caracteres permitidos.",
        maxlength: "Máximo de 11 caracteres permitidos.",
      },

      tel:{
        required: "Informe o seu telefone.",
        minlength: "Mínimo de 11 caracteres permitidos.",
        maxlength: "Máximo de 11 caracteres permitidos.",
      },

      password:{
        required: "Informe uma senha.",
        minlength: "A senha deve ter no mínimo 6 caracteres."
      },

      password_confirmation:{
        required: "Informe novamente a senha.",
        minlength: "A confirmação de senha deve ter no mínimo 6 caracteres.",
        equalTo: "A confirmação de senha não confere."
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