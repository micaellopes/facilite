// Precisa do JqueryValidation e BlockUI
$().ready(function() {

  $('#form_alterar_senha').validate({

    errorClass: 'text-danger font-13',
    errorElement: 'strong',
    rules:{

      current_password:{
        required: true,
        minlength: 6
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

      current_password:{
        required: "Informe a senha atual.",
        minlength: "A senha tem no mínimo 6 caracteres."
      },

      password:{
        required: "Informe a nova senha.",
        minlength: "A nova senha deve ter no mínimo 6 caracteres."
      },

      password_confirmation:{
        required: "Informe novamente a nova senha.",
        minlength: "A confirmação da nova senha deve ter no mínimo 6 caracteres.",
        equalTo: "A confirmação da nova senha não confere."
      }

    },

    // Após validar form
    submitHandler: function(form) {

      $('#modalAlterarSenha').modal('hide');
      
      $.blockUI({ 
        message: '<h4>Confirmando</h4><h4>Aguarde um instante...</h4>',
        // showOverlay: false,
        fadeIn: 400,
        // fadeOut: 500,
        timeout: 2000,
        css: { zIndex: 20000, border: 'none', padding: '20px', backgroundColor: '#FFFFFF', '-webkit-border-radius': '20px', 
        '-moz-border-radius': '20px', color: '#024D62' }
      }); 

      form.submit();
    }

  });
});