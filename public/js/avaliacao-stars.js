function average(calculo) {
    $('#average').html(Number(calculo).toFixed(2));

    var average = Number(calculo)*20;

    $('.bar-stars .bg').css('width', 0);
    $('.bar-stars .bg').animate({ width: (average) + '%' }, 500);
    // return Number(average)*20;
}

average(parseFloat($('#average').html()).toFixed(2));

$(function () {
    $(".star").on('mouseover',function(){
        var indice = $(".star").index(this);
        $('.star').removeClass('full');

        for (var i = 0 ; i <= indice; i++){
            $('.star:eq('+ i +')').addClass('full');
        }
    });

    $(".bar-stars").on('mouseout',function(){
        $('.star').removeClass('full');
        average(parseFloat($('#average').html()).toFixed(2));
    });

    $('.star').on('click',function () {
        var indice = $(".star").index(this) + 1;
        $.ajax({
            url: '/avaliar/' + $('input[name="profissional_id"]').val(),
            headers: {'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')},
            data: {
                "stars": indice
            },
            method: "POST",
            success:function (response) {
                console.log(response)
                var calculo = response.estrelas / response.avaliacoes;
                average(calculo);

            },
            error:function (error) {
                console.log(error)
            }
        });

        $.blockUI({
            message: '<span style="font-size: 20px;">Avaliação realizada com sucesso!!</span><span class="glyphicon glyphicon-ok-sign pull-left" style="font-size: 22px;"></span>',
            showOverlay: false,
            fadeIn: 700,
            fadeOut: 800,
            timeout: 3000,
            showOverlay: false,
            centerY: false,
            css: {
                width: '320px',
                top: 'auto',
                right: '20px',
                bottom: '20px',
                left: 'auto',
                border: 'none',
                padding: '10px',
                backgroundColor: '#5BB400',
                '-webkit-border-radius': '5px',
                '-moz-border-radius': '5px',
                color: '#FFFFFF' }
        });

    })
});