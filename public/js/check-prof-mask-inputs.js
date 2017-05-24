/* Necessita do plugin 'jquery.mask.min.js'*/

/* MOSTRAR/OCULTAR CAMPOS PROFISSIONAIS ao marcar/desmarcar checkbox 'role' */
$("#role,#role_edit").on("click", function() {
     if( $("#role,#role_edit").is(':checked') ){
        $("#cpf,#cpf_edit").prop("disabled", false); // <- = habilita input
        $("#tel,#tel_edit").prop("disabled", false); // <- = habilita input
        $("#formCpf,#formCpf_edit").fadeIn("linear");
        $("#formTel,#formTel_edit").fadeIn("slow");
    }else{
        $("#cpf,#cpf_edit").prop("disabled", true); // <- = desabilita input
        $("#tel,#tel_edit").prop("disabled", true); // <- = desabilita input
        $("#formCpf,#formCpf_edit").fadeOut("fast");
        $("#formTel,#formTel_edit").fadeOut("fast");
    }
});

/* CPF MASK */
$("#cpf,#cpf_edit").on("focus", function(){
    $("#cpf,#cpf_edit").mask("999.999.999-99");
});

/* TEL MASK */
$("#tel,#tel_edit").on("focus", function(){
    $("#tel,#tel_edit").mask("(99) 99999-9999");
});

///////////////////////////////
///////Ao Carregar Página//////
//////////////////////////////
$( window ).on( "load", function() {
    // Se checkbox "Sou Profissional" estiver marcado exibe e habilita os campos profissionais
    if( $("#role,#role_edit").is(':checked') ){
        $("#cpf,#cpf_edit").prop("disabled", false); // <- = habilita input
        $("#tel,#tel_edit").prop("disabled", false); // <- = habilita input
        $("#formCpf,#formCpf_edit").fadeIn("linear");
        $("#formTel,#formTel_edit").fadeIn("slow");
    }else{
        $("#cpf,#cpf_edit").prop("disabled", true); // <- = desabilita input
        $("#tel,#tel_edit").prop("disabled", true); // <- = desabilita input
        $("#formCpf,#formCpf_edit").hide();
        $("#formTel,#formTel_edit").hide();
    }
});