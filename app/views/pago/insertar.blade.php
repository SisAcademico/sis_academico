@extends('_layouts.app')
@section('titulo')
    @lang('sistema.pago')
@stop
@section('titulo_cabecera')
    @lang('Caja y Facturacion')
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.pago')</a></li>
    <li class="active">@lang('sistema.insertar_pago')s</li>
@stop

@section('contenido')
   <!-- Main row -->
    <?php
    date_default_timezone_set('America/Lima');
   //date = date(DATE_RFC2822);
    $date = date("Y-m-d");

    //$date1 = date_create('2000-01-01');
        //$date date_format('2000-01-01','Y-m-d H:i:s');

    ?>
    <div class="row">

</div>
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'pago','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title">Realizar Pago</h3>
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
                <div class="form-inline">
                    {{ Form::label('serie', Lang::get('Serie: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-xs-1">
                            <input name="serie" type="text" class="form-control" placeholder="" value= "001" readonly>
                        </div>
                    {{ Form::label('nro_boleta', Lang::get('Nro. Boleta: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-xs-2">
                            <input name="nro_boleta" type="text" class="form-control" placeholder="" value= "0000001" readonly>
                        </div>
                    {{ Form::label('fecha', Lang::get('Fecha: '),array('class'=>'col-sm-1 control-label')) }}
                        <div class="col-xs-2">
                            <input name='fecha' id="theInput" placeholder="Seleccione Fecha" class="form-control" placeholder="" value='<?php echo $date;?>' readonly>
                        </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    {{ Form::label('Codigo', Lang::get('Codigo: '),array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-xs-2">
                         <input id="idalumno" type="text" placeholder="Ingrese Codigo" class="form-control" name="idalumno" maxlength="10" required>
                    </div>
                           <button type="button"  id='codigo' class="btn btn-info ">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                           </button>                    
                </div>
            </div>
            <div class="form-group">
                <div class="form-group">
                    {{ Form::label('nombres', Lang::get('Nombre: '),array('class'=>'col-sm-2 control-label')) }}
                         <div class="col-xs-2">
                            <b id = "nombres" class='form-control' placeholder ='Nombres'> </b>
                       </div>
                    {{ Form::label('apellidos', Lang::get('Apellido: '),array('class'=>'col-sm-2 control-label')) }}
                         <div class="col-xs-2">
                            <b id="apellidos" class='form-control' placeholder ='Apellidos'></b>
                        </div>
                </div>
            </div>
            <div class="form-group">
                    {{ Form::label('Concepto', Lang::get('Concepto: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-3">
                            {{ Form::select('idconcepto',$concepto,null,array('class'=>'form-control','required'=>'required', 'id' =>'idconcepto')) }}
                        </div>
                     
                    {{ Form::label('Importe', Lang::get('Importe: '),array('class'=>'col-sm-1 control-label')) }}
                    <div class="col-xs-2">
                         <b id="importe" class='form-control' placeholder ='importe' ></b>
                    </div> 
                    <button type="button" class="btn btn-info " id='btn-agregar'>
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                    </button>  
            </div>
            <div class="col-md-10">
            <table id="detalle_pago" class="table table-striped" >
                <thead>
                    <tr>
                        <th class='hidden'>codigo</th>
                        <th style='width: 60px;'>Nro</th>
                        <th>Descripcion</th>
                        <th>P.U.</th>
                        <th style='width: 100px;'>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>

            <p>
                <div class="form-group">
                {{ Form::label('Total', Lang::get('Total: '),array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-xs-2">
                         {{ Form::number('Total','0.00', array('class'=>'form-control','readonly'=>'readonly', 'min'=>0)) }}
                    </div>  
                {{ Form::submit(Lang::get('Guardar'), array('class' => 'btn btn-info pull-right')) }}                    
                </div>
            </p>              
            
            </div>
            {{ Form::close() }}
        </div>
      <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
</div>
        @section ('scrips_n')
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
                <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
        <script type="text/javascript">

            var preciototal = 0;
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
            function funcion(idfila,precio)
            {
                var fila= document.getElementById(idfila);
                fila.parentNode.removeChild(fila);
                preciototal=preciototal-precio;
                Total.value=preciototal +'.00';
                   
            }

            $(document).ready(function(){
                $('#codigo').click(function(){
                    $.ajax(
                    {
                        url:'recuperarAlumno',
                        type:'GET',
                        data: {'codigoAlumno' : $('#idalumno').val()},
                        datatype: 'JSON',
                        beforeSend: function(){
                            $('#nombres').html("Buscando Alumno");
                        },
                        error:function (errors) {
                            $('#nombres').html(errors);
                        },
                        success:function(respuesta){
                            console.log(respuesta);
                            if(respuesta.mensaje == 'Existe' )
                            {
                                $('#nombres').html(respuesta.alumno[0].nombres);
                                $('#apellidos').html(respuesta.alumno[0].apellidos);    
                            }
                            else
                            {
                                 $('#nombres').html("no existe ese Alumno");      
                                 $('#idalumno').html("");
                            }
                        }
                    });
                })
                
                $('#idconcepto').change(function(){
                    $.ajax(
                    {
                        url:'recuperarImporte',
                        type:'GET',
                        data: {'idconcepto' : $('#idconcepto').val()},
                        datatype: 'JSON',
                        beforeSend: function(){
                            $('#importe').html("Buscando Importe");
                        },
                        error:function (errors) {
                            $('#importe').html(errors);
                        },
                        success:function(respuesta){
                            console.log(respuesta);
                            $('#importe').html(respuesta.concepto[0].importe);                           
                        }
                    });
                })

                $('#btn-agregar').click(function(){
                    $.ajax(
                    {
                        url:'recuperarImporte',
                        type:'GET',
                        data: {'idconcepto' : $('#idconcepto').val()},
                        datatype: 'JSON',
                        beforeSend: function(){
                            
                        },
                        error:function (errors) {
                            alert(errors);
                        },
                        success:function(respuesta){
                            tr=document.all.detalle_pago.insertRow();
                            var fila= $('#detalle_pago tr').length-1;
                            tr.setAttribute('id',fila);
                            td=tr.insertCell();
                            td.setAttribute('class','hidden');
                            td.innerHTML='<input type= "text" id="'+ fila+'" name="'+fila+'" value="'+ respuesta.concepto[0].idconcepto+'" required>';
                            td=tr.insertCell();
                            td.innerHTML=fila;
                            td=tr.insertCell();
                            td.innerHTML="<b>" + respuesta.concepto[0].concepto +"</b>";
                            td=tr.insertCell();
                            td.innerHTML="<b>" + respuesta.concepto[0].importe +"</b>";
                            td=tr.insertCell();
                            td.innerHTML= "<button type='button' onclick='funcion(" + fila +"," + respuesta.concepto[0].importe +" )' class = 'btn btn-primary btn-block' >quitar</button>";
                            preciototal = parseInt(preciototal) + parseInt(respuesta.concepto[0].importe);
                            Total.value = preciototal + ".00";
                        }
                    });
                })
            });


        </script>
        @stop

@endsection
