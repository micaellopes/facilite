// Precisa do JqueryValidation e BlockUI
$().ready(function() {

  $('#form_prof, #form_user, #form_categorias, #form_servicos, #form_especialidades, #form_desc').validate({

    errorClass: 'text-danger',
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


    },

    messages:{

      name:{
        required: "Informe o seu nome.",
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
      }

    },

    // Após validar form
    submitHandler: function(form) {
      
      $.blockUI({ 
        message: '<h4>Atualizando dados</h4><h4>Aguarde...</h4>',
        fadeIn: 300,
        timeout: 2500,
        css: { zIndex: 20000, border: 'none', padding: '20px', backgroundColor: '#FFFFFF', '-webkit-border-radius': '10px', 
        '-moz-border-radius': '10px', opacity: .9, color: '#024D62' }
      }); 

      form.submit();
    }

  });
});