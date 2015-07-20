@extends('_layouts.app')

@section('titulo')
    @lang('Concepto Pago')
@stop

@section('titulo_cabecera')
    @lang('Concepto Pago')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.concepto')</a></li>
    <li class="active">@lang('sistema.listar_concepto')s</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon">    
          <a href="javascript: void(0)"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>

        </div>
                <div class="google-expando__card" aria-hidden="true" >
              {{ Form::open(array('url' => 'concepto', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Concepto de Pago</h3>
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
                        {{ Form::label('idconcepto', Lang::get('Codigo Concepto: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="idconcepto" type="text" placeholder="Codigo Concepto" class="form-control" name="idconcepto" maxlength="5" onKeyPress="return validar(event)" required>
                        </div>
                    </div>
                     <div class="form-group">
                        {{ Form::label('concepto', Lang::get('Concepto: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="concepto" type="text" placeholder="Descripcion del Concepto de pago" class="form-control" name="concepto" minlength="10" maxlength="180" required>
                       </div>
                    </div>
                     <div class="form-group">
                        {{ Form::label('observacion', Lang::get('Observacion: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="observacion" type="text" placeholder="Observacion" class="form-control" name="observacion" minlength="10" maxlength="250" required>
                       </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('importe', Lang::get('Importe: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="importe" type="text" placeholder="Importe" class="form-control" name="importe" onKeyPress="return validar(event)" maxlength="10"  minlenght ="1" required>
                        </div>
                    </div>               
                </div>
                <div class="box-footer">
                     {{ Form::submit(Lang::get('Agregar Concepto'), array('class' => 'btn btn-info pull-right')) }}
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
                  <h3 class="box-title">Lista de Conceptos de Pagos </h3><!--titulo del frame-->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                        <th>Nro</th>
                      <th>Concepto</th>
                      <th>Importe</th>
                         </tr>
                    @foreach($conceptos as $Concep)
                  <tr>
                     <td>{{$Concep->idconcepto}}<?php ?></td>
                      <td>{{$Concep->concepto}}</td>
                      <td>{{$Concep->importe}}</td>
                       <td>
                      <a href="{{URL::to( '/concepto') }}/{{ $Concep->idconcepto }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                      <a href="{{URL::to( '/concepto') }}/{{ $Concep->idconcepto}}/destroy" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </td>
                      </tr>
                    @endforeach
                    </table>                    
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
                  {{$conceptos->links();}}
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