@extends('layouts.inicio')
@section('contenido')


      <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
<!--
                <div class="box-header with-border">
                  <h3 class="box-title">Historias de Pacientes</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
-->                
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
                        <!--Contenido-->
                         <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                @if ($searchText)

                                  La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" historias.

                                @endif 
                                
                                @include('historias.search')
                                
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover">
                                  @foreach($historias as $paciente)

                                    <tr>
                                      <td>
                                        <ul class="list-inline">
                                          <li >
                                            
                                            <?php 

                                                $ruta_img = "fotos/p".$paciente->historia.".jpg"; //
                                                //echo $ruta_img

                                                if(file_exists($ruta_img)) // Debo saber si existe esta foto
                                                  {

                                                    $ruta_foto = $ruta_img;
                                                    //echo $ruta_foto;
                                                  
                                                  }else{
                                                  
                                                    //echo "No esta la imagen ".$ruta_img;
                                                    $ruta_foto = "fotos/avatar.png";

                                                  }
                                                
                                            ?>  
                                            <img src="{{ $ruta_foto }}" class="img-circle" alt="User Image" width="56px" height="56px">
                                          </li>
                                        </ul>
                                      </td>
                                      <td>
                                          00000{{ $paciente->historia }} - {{ $paciente->cedula }}<br />
                                          {{ $paciente->paciente }}<br />
                                          <?php

                                              $fecha = $paciente->fecha_nacimiento;

                                              $fecha = str_replace("/","-",$fecha);

                                              $fecha = date('Y/m/d',strtotime($fecha));

                                              $hoy = date('Y/m/d');

                                              $edad = $hoy - $fecha;

                                              $nacimiento = date('d/m/Y',strtotime($fecha));


                                          ?>
                                          {{ $nacimiento }} - Edad: {{ $edad }}
                                      </td>
                                      <td>
                                          Nació en: {{ $paciente->lugar_nacio }} <br />
                                          Dirección Actual: {{ $paciente->direccion }} / {{ $paciente->estado }} <br />                                          
                                          {{ $paciente->telefonos }} - {{ $paciente->telefono_movil }}                                          
                                      </td>
                                      <td>
                                        <a href=""><button class="btn btn-info">Consultar</button></a>
                                      </td>
                                    </tr>
                                  
                                  @endforeach
                                </table>
                              </div>

                            </div>
                                </div>
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->

@endsection