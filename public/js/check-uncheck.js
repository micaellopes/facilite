/**
 * Ao carregar a página
 */
$( window ).on( "load", function() {

    /* ********************** Aplica estilo se checkbox estiver marcado ********************* */

    //////////////////////////////
    ///////// Outros Checkbox's //
    //////////////////////////////

     // Cadastrar / Editar Conta
    if( $("#role,#role_edit").is(":checked") ){
        $('#check_span_role').removeClass('glyphicon-unchecked');
        $('#check_span_role').addClass('glyphicon-check');
        $("#check_span_role").css({color: "#024D62"});
        // $("#label_role").css({color: "#024D62"});
    }else{
        $('#check_span_role').removeClass('glyphicon-check');
        $('#check_span_role').addClass('glyphicon-unchecked');
        $("#check_span_role").css({color: "#272727"});
        // $("#label_role").css({color: "#272727"});
    }

    //////////////////////////////
    ///////// Editar Categorias //
    //////////////////////////////

    // cat_1
    if( $("#cat_1").is(":checked") ){
        $('#check_span_1').removeClass('glyphicon-unchecked');
        $('#check_span_1').addClass('glyphicon-check');
        $("#check_span_1").css({color: "#5BB400"});
        $("#label_cat_1").css({color: "#5BB400"});
        // $('#img_cat_1').addClass('shadow-style');
    }else{
        $('#check_span_1').removeClass('glyphicon-check');
        $('#check_span_1').addClass('glyphicon-unchecked');
        // $("#check_span_1").css({color: "#024D62"});
        // $("#label_cat_1").css({color: "#024D62"});
        // $('#img_cat_1').removeClass('shadow-style');
    }

    // cat_2
    if( $("#cat_2").is(":checked") ){
        $('#check_span_2').removeClass('glyphicon-unchecked');
        $('#check_span_2').addClass('glyphicon-check');
        $("#check_span_2").css({color: "#5BB400"});
        $("#label_cat_2").css({color: "#5BB400"});
        // $('#img_cat_2').addClass('shadow-style');
    }else{
        $('#check_span_2').removeClass('glyphicon-check');
        $('#check_span_2').addClass('glyphicon-unchecked');
        // $("#check_span_2").css({color: "#272727"});
        // $("#label_cat_2").css({color: "#272727"});
        // $('#img_cat_2').removeClass('shadow-style');
    }

    // cat_3
    if( $("#cat_3").is(":checked") ){
        $('#check_span_3').removeClass('glyphicon-unchecked');
        $('#check_span_3').addClass('glyphicon-check');
        $("#check_span_3").css({color: "#5BB400"});
        $("#label_cat_3").css({color: "#5BB400"});
        // $('#img_cat_3').addClass('shadow-style');
    }else{
        $('#check_span_3').removeClass('glyphicon-check');
        $('#check_span_3').addClass('glyphicon-unchecked');
        // $("#check_span_3").css({color: "#272727"});
        // $("#label_cat_3").css({color: "#272727"});
        // $('#img_cat_3').removeClass('shadow-style');
    }

    // cat_4
    if( $("#cat_4").is(":checked") ){
        $('#check_span_4').removeClass('glyphicon-unchecked');
        $('#check_span_4').addClass('glyphicon-check');
        $("#check_span_4").css({color: "#5BB400"});
        $("#label_cat_4").css({color: "#5BB400"});
        // $('#img_cat_4').addClass('shadow-style');
    }else{
        $('#check_span_4').removeClass('glyphicon-check');
        $('#check_span_4').addClass('glyphicon-unchecked');
        // $("#check_span_4").css({color: "#272727"});
        // $("#label_cat_4").css({color: "#272727"});
        // $('#img_cat_4').removeClass('shadow-style');
    }

    // cat_5
    if( $("#cat_5").is(":checked") ){
        $('#check_span_5').removeClass('glyphicon-unchecked');
        $('#check_span_5').addClass('glyphicon-check');
        $("#check_span_5").css({color: "#5BB400"});
        $("#label_cat_5").css({color: "#5BB400"});
        // $('#img_cat_5').addClass('shadow-style');
    }else{
        $('#check_span_5').removeClass('glyphicon-check');
        $('#check_span_5').addClass('glyphicon-unchecked');
        // $("#check_span_5").css({color: "#272727"});
        // $("#label_cat_5").css({color: "#272727"});
        // $('#img_cat_5').removeClass('shadow-style');
    }

    // cat_6
    if( $("#cat_6").is(":checked") ){
        $('#check_span_6').removeClass('glyphicon-unchecked');
        $('#check_span_6').addClass('glyphicon-check');
        $("#check_span_6").css({color: "#5BB400"});
        $("#label_cat_6").css({color: "#5BB400"});
        // $('#img_cat_6').addClass('shadow-style');
    }else{
        $('#check_span_6').removeClass('glyphicon-check');
        $('#check_span_6').addClass('glyphicon-unchecked');
        // $("#check_span_6").css({color: "#272727"});
        // $("#label_cat_6").css({color: "#272727"});
        // $('#img_cat_6').removeClass('shadow-style');
    }

    /* ************************************************************************************** */

});

/**
 * Ao carregar o DOM
 */
 $( document ).ready(function() {

    /******************** Cursor mãozinha em cima dos botões das categorias ******************/

    //////////////////////////////
    ///////// Outros Checkbox's //
    //////////////////////////////
    
    // Login / Editar Conta
    $('#label_role, #check_span_role').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    //////////////////////////////
    ///////// Editar Categorias //
    //////////////////////////////
    
    // cat_1
    $('#label_cat_1, #check_span_1').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_2
    $('#label_cat_2, #check_span_2').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_3
    $('#label_cat_3, #check_span_3').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_4
    $('#label_cat_4, #check_span_4').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_5
    $('#label_cat_5, #check_span_5').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    // cat_6
    $('#label_cat_6, #check_span_6').mouseover(function() {
        $(this).css({cursor: "pointer"});
    });

    /* ************************************************************************************** */

    /* ************************ Check-uncheck style botões categorias************************ */

    //////////////////////////////
    ///////// Outros Checkbox's //
    //////////////////////////////
    
    // Cadastrar / Editar Conta
    $("#check_span_role, #label_role").on("click", function() {
        if( $("#cat_1").is(":checked") ){
            $("#cat_1").prop("checked", false);
        }else{
            $("#cat_1").prop("checked", true);
        }

        if( $("#role,#role_edit").is(":checked") ){
            $('#check_span_role').removeClass('glyphicon-unchecked');
            $('#check_span_role').addClass('glyphicon-check');
            $("#check_span_role").css({color: "#024D62"});
            // $("#label_role").css({color: "#024D62"});
        }else{
            $('#check_span_role').removeClass('glyphicon-check');
            $('#check_span_role').addClass('glyphicon-unchecked');
            $("#check_span_role").css({color: "#272727"});
            // $("#label_role").css({color: "#272727"});
        }  
    });


    //////////////////////////////
    ///////// Editar Categorias //
    //////////////////////////////
    
    // cat_1
    $("#img_cat_1,#check_span_1, #label_cat_1").on("click", function() {
        if( $("#cat_1").is(":checked") ){
            $("#cat_1").prop("checked", false);
        }else{
            $("#cat_1").prop("checked", true);
        }

        if( $("#cat_1").is(":checked") ){
            $('#check_span_1').removeClass('glyphicon-unchecked');
            $('#check_span_1').addClass('glyphicon-check');
            $("#check_span_1").css({color: "#5BB400"});
            $("#label_cat_1").css({color: "#5BB400"});
            // $('#img_cat_1').addClass('shadow-style');
        }else{
            $('#check_span_1').removeClass('glyphicon-check');
            $('#check_span_1').addClass('glyphicon-unchecked');
            $("#check_span_1").css({color: "#272727"});
            $("#label_cat_1").css({color: "#272727"});
            // $('#img_cat_1').removeClass('shadow-style');
        }  
    });

    // cat_2
    $("#img_cat_2,#check_span_2, #label_cat_2").on("click", function() {
        if( $("#cat_2").is(":checked") ){
            $("#cat_2").prop("checked", false);
        }else{
            $("#cat_2").prop("checked", true);
        }

        if( $("#cat_2").is(":checked") ){
            $('#check_span_2').removeClass('glyphicon-unchecked');
            $('#check_span_2').addClass('glyphicon-check');
            $("#check_span_2").css({color: "#5BB400"});
            $("#label_cat_2").css({color: "#5BB400"});
            // $('#img_cat_2').addClass('shadow-style');
        }else{
            $('#check_span_2').removeClass('glyphicon-check');
            $('#check_span_2').addClass('glyphicon-unchecked');
            $("#check_span_2").css({color: "#272727"});
            $("#label_cat_2").css({color: "#272727"});
            // $('#img_cat_2').removeClass('shadow-style');
        }    
    });

    // cat_3
    $("#img_cat_3,#check_span_3, #label_cat_3").on("click", function() {
        if( $("#cat_3").is(":checked") ){
            $("#cat_3").prop("checked", false);
        }else{
            $("#cat_3").prop("checked", true);
        }

        if( $("#cat_3").is(":checked") ){
            $('#check_span_3').removeClass('glyphicon-unchecked');
            $('#check_span_3').addClass('glyphicon-check');
            $("#check_span_3").css({color: "#5BB400"});
            $("#label_cat_3").css({color: "#5BB400"});
            // $('#img_cat_3').addClass('shadow-style');
        }else{
            $('#check_span_3').removeClass('glyphicon-check');
            $('#check_span_3').addClass('glyphicon-unchecked');
            $("#check_span_3").css({color: "#272727"});
            $("#label_cat_3").css({color: "#272727"});
            // $('#img_cat_3').removeClass('shadow-style');
        } 
    });

    // cat_4
    $("#img_cat_4,#check_span_4, #label_cat_4").on("click", function() {
        if( $("#cat_4").is(":checked") ){
            $("#cat_4").prop("checked", false);
        }else{
            $("#cat_4").prop("checked", true);
        }

        if( $("#cat_4").is(":checked") ){
            $('#check_span_4').removeClass('glyphicon-unchecked');
            $('#check_span_4').addClass('glyphicon-check');
            $("#check_span_4").css({color: "#5BB400"});
            $("#label_cat_4").css({color: "#5BB400"});
            // $('#img_cat_4').addClass('shadow-style');
        }else{
            $('#check_span_4').removeClass('glyphicon-check');
            $('#check_span_4').addClass('glyphicon-unchecked');
            $("#check_span_4").css({color: "#272727"});
            $("#label_cat_4").css({color: "#272727"});
            // $('#img_cat_4').removeClass('shadow-style');
        }  
    });

    // cat_5
    $("#img_cat_5,#check_span_5, #label_cat_5").on("click", function() {
        if( $("#cat_5").is(":checked") ){
            $("#cat_5").prop("checked", false);
        }else{
            $("#cat_5").prop("checked", true);
        }

        if( $("#cat_5").is(":checked") ){
            $('#check_span_5').removeClass('glyphicon-unchecked');
            $('#check_span_5').addClass('glyphicon-check');
            $("#check_span_5").css({color: "#5BB400"});
            $("#label_cat_5").css({color: "#5BB400"});
            // $('#img_cat_5').addClass('shadow-style');
        }else{
            $('#check_span_5').removeClass('glyphicon-check');
            $('#check_span_5').addClass('glyphicon-unchecked');
            $("#check_span_5").css({color: "#272727"});
            $("#label_cat_5").css({color: "#272727"});
            // $('#img_cat_5').removeClass('shadow-style');
        }  
    });

    // cat_6
    $("#img_cat_6,#check_span_6, #label_cat_6").on("click", function() {
        if( $("#cat_6").is(":checked") ){
            $("#cat_6").prop("checked", false);
        }else{
            $("#cat_6").prop("checked", true);
        }

        if( $("#cat_6").is(":checked") ){
            $('#check_span_6').removeClass('glyphicon-unchecked');
            $('#check_span_6').addClass('glyphicon-check');
            $("#check_span_6").css({color: "#5BB400"});
            $("#label_cat_6").css({color: "#5BB400"});
            // $('#img_cat_6').addClass('shadow-style');
        }else{
            $('#check_span_6').removeClass('glyphicon-check');
            $('#check_span_6').addClass('glyphicon-unchecked');
            $("#check_span_6").css({color: "#272727"});
            $("#label_cat_6").css({color: "#272727"});
            // $('#img_cat_6').removeClass('shadow-style');
        }  
    });

    /* ************************************************************************************** */

});