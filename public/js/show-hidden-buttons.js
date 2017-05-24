$( document ).ready(function() {

	//////////////////////////////////////
	//********* Botão Salvar/Editar Url //
	//////////////////////////////////////
	
	// Mostra botão ao focar o input
    $("#url_perfil").focus(function() {
        $("#bt-salvar-url").show('fast');
    });

    // Habilita botão ao alterar o texto do input
    $("#url_perfil").keydown(function() {
    	$("#bt-salvar-url").text('Salvar');
    	$("#bt-salvar-url").removeClass('disabled');
		$("#bt-salvar-url").prop('disabled', false);
	});

    // Esconde o botão ao perder o foco do input
    // $("#url_perfil").blur(function() {
    //     $("#bt-salvar-url").hide('fast');
    // });
    

    // //////////////////////////////////////////
	//********* Botão Salvar/Editar Descrição //
	////////////////////////////////////////////
	
	// Mostra botão ao focar o input
    $("#description").focus(function() {
        $("#bt-salvar-descricao").show('fast');
    });

    // Habilita botão ao alterar o texto do input
    $("#description").keydown(function() {
    	$("#bt-salvar-descricao").text('Salvar');
    	$("#bt-salvar-descricao").removeClass('disabled');
		$("#bt-salvar-descricao").prop('disabled', false);
	});

    // Esconde o botão ao perder o foco do input
    // $("#url_perfil").blur(function() {
    //     $("#bt-salvar-url").hide('fast');
    // });



});