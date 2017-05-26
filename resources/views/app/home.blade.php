@extends('layouts.master-fluid')

@section('title') Facilite Serviços @endsection

@section('navbar')
    @include('layouts.includes.header-fixed')
@endsection

@section('content')

	<h1 style="text-align: center">HOME PAGE</h1>


	<!--  Demos -->
	<div class="owl-carousel owl-theme owl-loaded">
		<div class="owl-stage-outer">
			<div class="owl-stage">
				<img src="{{asset('uploads/avatars/1463283007.jpg')}}" alt="">
				<img src="{{asset('uploads/avatars/1463283007.jpg')}}" alt="">
				<img src="{{asset('uploads/avatars/1463283007.jpg')}}" alt="">
				<img src="{{asset('uploads/avatars/1463283007.jpg')}}" alt="">
			</div>
		</div>
		<div class="owl-controls">
			<div class="owl-nav">
				<div class="owl-prev">prev</div>
				<div class="owl-next">next</div>
			</div>
			<div class="owl-dots">
				<div class="owl-dot active"><span></span></div>
				<div class="owl-dot"><span></span></div>
				<div class="owl-dot"><span></span></div>
				<div class="owl-dot"><span></span></div>
			</div>
		</div>
	</div>
	{{-- ************** Mensagens de Sessão **************** --}}
	{{-- Cadastro efetuado --}}
	@if (session('cadastro-efetuado'))
		<span style="display: none;" id="cadastro-efetuado" class="help-block">
		  <strong class="text-success">{{ session('cadastro-efetuado') }}</strong>
		</span>
	@endif

@endsection

@section('footer')
	 {{--@include('layouts.includes.footer')--}}
@endsection

@push('scripts')
	{{-- Jquery BlockUI --}}
	<script src="{{ asset('js/jquery.blockUI.js') }}"></script>
	{{-- Dados atualizados/Erro ao atualizar, mensagens de sessão --}}
  	<script src="{{ asset('js/notifications/mensagens-sessao.js') }}"></script>

	<script src="{{ asset('js/owl.carousel.min.js')  }}"></script>

		<script>
            var owl = $('.owl-carousel');
//            owl.owlCarousel({
////                autoplay:true,
//            });
//            $('.play').on('click',function(){
//                owl.trigger('play.owl.autoplay',[1000])
//            })
//            $('.stop').on('click',function(){
//                owl.trigger('stop.owl.autoplay')
//            })
		</script>
@endpush