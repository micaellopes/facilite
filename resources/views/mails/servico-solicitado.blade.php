<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Email - Serviço Solicitado</title>
</head>
<body>
	<h1 style="color: #25B1CF;">FACILITE SERVIÇOS</h1>
	<h2>Olá, <b>{{ $prof_name }}</b>.</h2>
	<h3>Você tem uma nova solicitação de serviço!</h3>
	<p>Clique <a href="{{route('solicitacoes')}}">aqui</a> e acompanhe todas as solicitações de serviço direcionadas à você.</p>
	<br>
	<p>Atenciosamente, Equipe Facilite Serviços.</p>
</body>
</html>