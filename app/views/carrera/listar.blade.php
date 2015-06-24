@extends('_layouts.app')

@section('titulo')
    @lang('Carreras')
@stop

@section('titulo_cabecera')
    @lang('Carreras')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.carrera')</a></li>
    <li class="active">@lang('sistema.listar_carrera')s</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon">    
          <a href="#"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>

        </div>
                <div class="google-expando__card" aria-hidden="true" >
              {{ Form::open(array('url' => 'carrera', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Insertar Carrera Profesional</h3>
                    </div><!-- /.box-header -->
                <div class="box-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <ul class="error_list">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        {{ Form::label('idcarrera', Lang::get('Codigo Carrera: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="idcarrera" type="text" placeholder="Codigo Carrera" class="form-control" name="idcarrera" maxlength="5" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombre_carrera', Lang::get('Nombre de la Carrera: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="nombre_carrera" type="text" placeholder="Nombre Carrera" class="form-control" name="nombre_carrera" maxlength="50" required>
                       </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nro_modulos', Lang::get('Nro. De Modulos: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="nro_modulos" type="text" placeholder="Nro. de Modulos" class="form-control" name="nro_modulos" onKeyPress="return validar(event)" maxlength="11" required>
                        </div>
                    </div>               
                </div>
                <div class="box-footer">
                     {{ Form::submit(Lang::get('Crear Carrera'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
</div>
</div>
</div>


      <!-- Main row -->
      <div class="row">
        <!-- INICIO: BOX PANEL -->
          <div class="col-md-12 col-sm-8">
             <div class="box box-success">
                <div class="box-header with-border" align="center">
                  <h3 class="box-title">Lista de Carreras</h3><!--titulo del frame-->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                        <th>Id Carrera</th>
                      <th>Nombre Carrera</th>
                      <th>Nro. Modulos</th>
                         </tr>
                    @foreach($carreras as $Carr)
                  <tr>
                     <td>{{$Carr->idcarrera}}</td>
                      <td>{{$Carr->nombre_carrera}}</td>
                      <td>{{$Carr->nro_modulos}}</td>
                       <td>
                      <a href="/sis_academico/public/carrera/{{ $Carr->idcarrera }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                    
                    </td>
                      </tr>
                    @endforeach
                    </table>                    
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
                  <ul class="pagination pagination-sm no-margin">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                  </ul>
                </div>
             </div><!-- /.box -->
          </div>
          <!-- INICIO: BOX PANEL -->
      </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja1.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            function validar(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                if (tecla==8) return true; 
                if (tecla==44) return true; 
                if (tecla==48) return true;
                if (tecla==49) return true;
                if (tecla==50) return true;
                if (tecla==51) return true;
                if (tecla==52) return true;
                if (tecla==53) return true;
                if (tecla==54) return true;
                if (tecla==55) return true;
                if (tecla==56) return true;
                if (tecla==57) return true;
                patron = /1/; //ver nota
                te = String.fromCharCode(tecla);
                return patron.test(te); 
            } 
        </script>
    @stop
@endsection