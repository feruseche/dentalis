@extends('layouts.inicio')
@section('contenido')



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
                          <!-- <div class="row"> -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-condensed table-hover">
                                  @foreach($historias as $paciente)

                                    <tr>
                                      <td width="60px">
                                            
                                            <?php 

                                                $ruta_img = "fotos/pacientes/p".$paciente->historia.".jpg"; //
                                                //echo $ruta_img

                                                if(file_exists($ruta_img)) // Debo saber si existe esta foto
                                                  {

                                                    $ruta_foto = $ruta_img;
                                                    //echo $ruta_foto;
                                                  
                                                  }else{
                                                  
                                                    //echo "No esta la imagen ".$ruta_img;
                                                    $ruta_foto = "fotos/pacientes/avatar.png";

                                                  }
                                                
                                            ?>  
                                            <img src="{{ $ruta_foto }}" class="img-circle" alt="User Image" width="56px" height="56px">
                                      </td>
                                      <td>
                                          <strong>{{ $paciente->paciente }}<br /></strong>


                                          <?php

                                              $fecha = $paciente->fecha_nacimiento;

                                              $fecha = str_replace("/","-",$fecha);

                                              $fecha = date('Y/m/d',strtotime($fecha));

                                              $hoy = date('Y/m/d');

                                              $edad = $hoy - $fecha;

                                              $nacimiento = date('d/m/Y',strtotime($fecha));


                                          ?>
                                          <i>{{ $nacimiento }} - Edad: {{ $edad }} </i>  <br />
                                          <i>{{ $paciente->telefono_movil }} - {{ $paciente->email }}</i>
                                      </td>
                                      <td>
                                        <!-- <a href="{{ route('detalle', ['id' => $paciente->historia]) }}"><button class="btn btn-info">Consultar</button></a>
                                        -->
                                      </td>
                                    </tr>
                                  
                                  @endforeach
                                </table>
                              </div>
                              @if (!$searchText)

                                {{ $historias->render() }}

                              @endif
                            </div>
                          </div>                            
                          </div>

		                          <!--Fin Contenido-->
                      </div>
                    </div>

              </div><!-- /.box -->
            </div><!-- /.col-md-12 -->
          </div><!-- /.row -->



@endsection