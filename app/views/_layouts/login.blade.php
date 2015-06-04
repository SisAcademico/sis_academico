<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" href="{{asset('/adminlte/images/favicon.ico')}}" type="image/vnd.microsoft.icon"> -->

    <title>@section('titulo')@show</title>
	<!-- Bootstrap 3.3.4 -->
	<link href="{{asset('/adminlte/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<!-- Theme style -->
    <link href="{{asset('/adminlte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css">
	<!-- Font Awesome Icons -->
    <link href="{{asset('/adminlte/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- iCheck -->
	<link href="{{asset('/adminlte/plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css">
		
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="{{asset('/js/html5shiv.js')}}"></script>
        <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="login-page">
	<section>
          @section('contenido')
		  @show
    </section>
	<!-- INICIO: Scripts JS -->
	<!-- jQuery 2.1.4 -->
	<script src="{{asset('/adminlte/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="{{asset('/adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
	<script src="{{asset('/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
<!-- FIN: Scripts JS -->
</body>
</html>
