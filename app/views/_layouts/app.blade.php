<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" href="{{asset('/assets/adminlte/images/favicon.ico')}}" type="image/vnd.microsoft.icon"> -->

    <title> @section('titulo') @show </title>
    <!-- Bootstrap 3.3.4 -->
	<link href="{{asset('/adminlte/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<!-- Theme style -->
    <link href="{{asset('/adminlte/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css">
	<!-- Font Awesome Icons -->
    <link href="{{asset('/adminlte/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- iCheck -->
	<link href="{{asset('/adminlte/plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins -->
	<link href="{{asset('/adminlte/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css">
  
  @yield('estilos')
		
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="{{asset('/js/html5shiv.js')}}"></script>
        <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body class="skin-blue sidebar-mini">
	<div class="wrapper">
    <header class="main-header">
		<!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>@lang('sistema.nombre_sistema_corto')</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>@lang('sistema.nombre_sistema_corto1')</b></span>
        </a>
		<!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">@lang('admin.adm_notificacion')</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5 new members joined today
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> Very long description problems
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5 new members joined
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">@lang('sistema.adm_ver_todas_notificaciones')</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  {{ HTML::image('adminlte/dist/img/user2-160x160.jpg','Imagen de usuario', array('class' => 'user-image')) }}
                  <span class="hidden-xs">Nombre de usuario</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    {{ HTML::image('adminlte/dist/img/user2-160x160.jpg','Imagen de usuario', array('class' => 'img-circle')) }}
                    <p>Nombre completo</p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">@lang('sistema.perfil')</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">@lang('sistema.cerrar_sesion')</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
    </header>
	<!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
                {{ HTML::image('adminlte/dist/img/user2-160x160.jpg','Imagen de usuario', array('class' => 'img-circle')) }}
            </div>
            <div class="pull-left info">
              <p>Nombre Usuario</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Activado</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Buscar..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style="color:#fff;">{{ strtoupper(Lang::get('sistema.menu_navegacion'))}}</li>
            <li><a href="{{ URL::to( '/panel') }}"><i class="fa fa-dashboard"></i> @lang('sistema.panel')</a></li>
			 <li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Administradores</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL::to( '/administrador/listar') }}"><i class="fa fa-list"></i> Listar  Administradores</a></li>
                <li><a href="{{ URL::to( '/administrador/insertar') }}"><i class="fa fa-plus"></i> Agregar  Administrador</a></li>
              </ul>
            </li>
            
			<li class="treeview">
              <a href="#">
                <i class="fa fa-users"></i> <span>Docentes</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ URL::to( '/docente/listar') }}"><i class="fa fa-list"></i> Listar  Docente</a></li>
                <li><a href="{{ URL::to( '/docente/insertar') }}"><i class="fa fa-plus"></i> Agregar  Docente</a></li>
                <li><a href="{{ URL::to( '/docente/listarasistencia') }}"><i class="fa fa-list"></i> Listar Asistencia Docente</a></li>
                <li><a href="{{ URL::to( '/docente/insertarasistencia') }}"><i class="fa fa-plus"></i> Agregar Asistencia  Docente</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="{{ URL::to( '/alumno') }}">
                <i class="fa fa-users"></i> <span>Alumnos</span>
              </a>
              
            </li>
			<li class="{{ Request::is( 'asignatura') ? 'active' : '' }}  treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>Asignaturas</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'asignatura') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/asignatura') }}"><i class="fa fa-list"></i> Listar Asignaturas</a></li>
                <li><a href="{{ URL::to( '/asignatura/create') }}"><i class="fa fa-plus"></i> Agregar Asignatura</a></li>
              </ul>
			</li>

        <li class="{{ Request::is( 'asignatura') ? 'active' : '' }}  treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>Asignaturas Libres</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'asignaturalibre') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/asignaturalibre') }}"><i class="fa fa-list"></i> Listar Asignaturas Libres</a></li>
                <li><a href="{{ URL::to( '/asignaturalibre/create') }}"><i class="fa fa-plus"></i> Agregar Asignaturas Libres</a></li>
              </ul>
      </li>


       

			<li class="{{ Request::is( 'carrera') ? 'active' : '' }} treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>Carrera</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'carrera') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/carrera/listar') }}"><i class="fa fa-list"></i> Listar carreras</a></li>
                <li><a href="{{ URL::to( '/carrera/insertar') }}"><i class="fa fa-plus"></i> Agregar carreras</a></li>
              </ul>
            </li>
      <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i> <span>@lang('Modulo')s</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'modulo') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/modulo/listar') }}"><i class="fa fa-list"></i> @lang('Listar Modulos')</a></li>
                <li><a href="{{ URL::to( '/modulo/insertar') }}"><i class="fa fa-plus"></i> @lang('Insertar Modulo')</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>@lang('sistema.semestre')s</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'semestre') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/semestre/listar') }}"><i class="fa fa-list"></i> @lang('sistema.listar_semestre')</a></li>
                <li><a href="{{ URL::to( '/semestre/agregar') }}"><i class="fa fa-plus"></i> @lang('sistema.agregar_semestre')</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>@lang('sistema.aula')s</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'aula') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/aula/listar') }}"><i class="fa fa-list"></i> @lang('sistema.listar_aulas')</a></li>
                <li><a href="{{ URL::to( '/aula/agregar') }}"><i class="fa fa-plus"></i> @lang('sistema.agregar_aula')</a></li>
              </ul>
            </li>
			<li class="{{ Request::is( 'pago') ? 'active' : '' }} treeview">
              <a href="#">
                <i class="fa fa-money"></i> <span>Pagos</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'pago') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/pago/listar') }}"><i class="fa fa-list"></i> Listar pagos</a></li>
                <li><a href="{{ URL::to( '/pago/insertar') }}"><i class="fa fa-plus"></i> Agregar pago</a></li>
              </ul>
            </li>
         <li class="{{ Request::is( 'asignatura') ? 'active' : '' }}  treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>Matricula</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'matricula') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/matricula') }}"><i class="fa fa-list"></i> Listar Matriculas</a></li>
                <li><a href="{{ URL::to( '/matricula/create') }}"><i class="fa fa-plus"></i> Realizar Matricula</a></li>
              </ul>
      </li>
      <li class="{{ Request::is( 'nota') ? 'active' : '' }}  treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>Nota</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'nota') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/nota') }}"><i class="fa fa-list"></i> Registrar Notas</a></li>
              </ul>
      </li>
      <li class="{{ Request::is( 'horario') ? 'active' : '' }}  treeview">
              <a href="#">
                <i class="fa fa-list"></i> <span>Horario</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="{{ Request::is( 'horario') ? 'active' : '' }} treeview-menu">
                <li><a href="{{ URL::to( '/horario') }}"><i class="fa fa-list"></i> Listar Horario</a></li>
              </ul>
      </li>
            <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Ayuda</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
	<!-- INICIO: Contenido principal -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>@section('titulo_cabecera')@show</h1>
          <ol class="breadcrumb">
			@section('ruta_navegacion')@show
          </ol>
        </section>
		
		<!-- Main content -->
        <section class="content">
			<!--INICIO: Contenido principal -->
			@section('contenido')
			@show
			<!--FIN: Contenido principal -->              
        </section><!-- /.content -->
    </div>
	<!-- FIN: Contenido principal -->
            <div class="leftpanel"
    </section>
    <footer class="main-footer">
		<div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2015 <a href="#">Ing. Informática y de Sistemas</a>.</strong> All rights reserved.
    </footer>
	</div>
	<!-- INICIO: Scripts JS -->
	<!-- INICIO: Scripts JS -->
	<!-- jQuery 2.1.4 -->
	<script src="{{asset('/adminlte/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
	<!-- Bootstrap 3.3.2 JS -->
	<script src="{{asset('/adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- iCheck -->
	<script src="{{asset('/adminlte/plugins/iCheck/icheck.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('/adminlte/dist/js/app.min.js')}}"></script>
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
  @yield('scrips_n')
</body>
</html>
