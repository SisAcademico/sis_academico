@extends('_layouts.app')
@section('titulo')
    @lang('Matricula')
@stop
@section('titulo_cabecera')
    @lang('Matricula')<small>@lang('Editar matricula')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Matricula')</a></li>
    <li class="active">@lang('Editar matricula')s</li>

@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop
@section('contenido')
    <!-- Main row -->
    <div class="row" >
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            
        @foreach($matri as $matriculas)
                {{ Form::open(array('url' => 'matricula/'.$matriculas->idmatricula,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Matricula</h3>
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
                            {{ Form::label('Fecha de Modificacion', Lang::get('Fecha de Modificacion'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-3">
                                <div class="input-group input-group-sm">
                                    {{ Form::text('fecha',$matriculas->fecha_matricula,array('class'=>'form-control fecha_cal','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly')) }}
                                    <span class="input-group-btn">
                                      <button class="btn bg-purple btn-flat btn_calen" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                         <div style="display:none;">   
                            <input id="idmatricula" type="text"  value="{{$matriculas->idmatricula}}" class="form-control" name="idmatricula">
                            <input id="idpago" type="text"  value="{{$matriculas->idpago}}" class="form-control" name="idpago">
                            <input id="idalumno" type="text"  value="{{$matriculas->idalumno}}" class="form-control" name="idalumno">
                            <input id="tipo" type="text"  value="{{$matriculas->tipo}}" class="form-control" name="tipo">
                        </div>>


                        <?php $carre11 = ""; ?>
                        @foreach($axuliar as $aaa)
                            <?php $carre11 = $carre11.$aaa->idasignatura.','; ?>
                        @endforeach
                        <input  type="text" id="anterior" value = "<?php echo (isset($carre11))?$carre11:'';?>" class="form-control" name="anterior" style="display:none" >
                        <div class="row-fluid">
                       <div class="col-xs-6">
                          <div class="table-responsive">
                             <table class="table table-bordered">
                                <thead>
                                   <tr>
                                        <th >Nombre</th>
                                        <th >Estado</th>
                                   </tr>
                                <thead>
                                <tbody>
                                   <tr>
                                <?php $gt = 0; ?>
                                <?php $tamaÃƒÂ±o = sizeof($axuliar); ?>
                                @foreach($asig as $alu)
                                <tr>
                                    <?php $gh = '1'; ?>
                                    <td>{{$alu->nombre_asignatura}}</td>
                                    @foreach($axuliar as $aux)
                                        @if($alu->idasignatura==$aux->idasignatura)
                                        <?php $gt = $gt +1; ?>
                                        <td><input id="nombre_asignatura"  type='checkbox' checked="true"  value="{{$alu->idasignatura}}" class="form-control" name="nombre" ></td>
                                         <?php $gh = '1'; ?>
                                         <?php break; ?>
                                        @else
                                         <?php $gh = '0'; ?>
                                        @endif
                                    @endforeach
                                    @if($gh==0)
                                        <td><input id="nombre_asignatura" type='checkbox'   value="{{$alu->idasignatura}}" class="form-control" name="nombre" ></td>
                                    @endif
                                    @if($tamaÃƒÂ±o==0)
                                        <td><input id="nombre_asignatura" type='checkbox'   value="{{$alu->idasignatura}}" class="form-control" name="nombre" ></td>
                                    @endif

                                </tr>
                                @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
               <?php $carre12 = ""; ?>
                @foreach($auxii as $aaa)
                        <?php $carre12 = $carre12.$aaa->idasignatura_cl.','; ?>
                @endforeach
                <input  type="text" id="anterior" value = "<?php echo (isset($carre12))?$carre12:'';?>" class="form-control" name="anterior" style="display:none" >
                <div class="col-xs-6">
                  <div class="table-responsive">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                                <th >Nombre Asignatura Libre</th>
                                <th >Estado</th>
                           </tr>
                        <thead>
                        <tbody>
                           <tr>
                                <?php $gt = 0; ?>
                                <?php $tamaÃƒÂ±o = sizeof($auxii); ?>
                                @foreach($curso_libre as $curlib)
                                <tr>
                                    <?php $gh = '1'; ?>
                                    <td>{{$curlib->nombre_asig_cl}}</td>
                                    @foreach($auxii as $aux)
                                        @if($curlib->idasignatura_cl==$aux->idasignatura_cl)
                                        <td><input id="nombre_asignatura2" type='checkbox' checked="true"   value="{{$curlib->idasignatura_cl}}" class="form-control" name="nombre2" ></td>
                                         <?php $gh = '1'; ?>
                                         <?php break; ?>
                                        @else
                                         <?php $gh = '0'; ?>
                                        @endif
                                    @endforeach
                                    @if($gh==0)
                                        <td><input id="nombre_asignatura2" type='checkbox'   value="{{$curlib->idasignatura_cl}}" class="form-control" name="nombre2" ></td> 
                                    @endif
                                    @if($tamaÃƒÂ±o==0)
                                        <td><input id="nombre_asignatura" type='checkbox'   value="{{$curlib->idasignatura_cl}}" class="form-control" name="nombre2" ></td>
                                    @endif
                                </tr>
                                @endforeach
                             </table>
                          </div>
                       </div>
                    </div>
                        

                    </div>
                    <div class="box-footer">
                        {{ Form::submit(Lang::get('Guardar Cambios'), array('class' => 'btn btn-info pull-right','id' => 'jajaja')) }}
                    </div>
                </div>
                <input id="cacche"  type='text'   value="poder"  name="nombre" style="display:none;">
                <input id="cacche2"  type='text'   value="poder2"  name="nombre2" style="display:none;">
                {{ Form::close() }}
         @endforeach  
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
        <script type="text/javascript">
            $(document).ready(function(){
                $('#jajaja').click(function(){
                    var values=$('input:checkbox[name=nombre]:checked').map(function(){
                        return this.value;
                    }).get();
                    var values2=$('input:checkbox[name=nombre2]:checked').map(function(){
                        return this.value;
                    }).get();
                    $('#cacche').val(values);
                    $('#cacche2').val(values2);
                });
            });
        </script>

    @stop<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection
