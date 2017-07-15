@extends('layouts.inicio')
@section('contenido')


    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <!--
          <div class="box-header with-border">
            <h3 class="box-title">Odontólogos de la Clínica</h3>
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
                    <h4>( {{ $nr }} ) profesionales registrados.</h4>

                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-condensed table-hover">
                                  @foreach($odontologos as $doctor)

                                    <tr>
                                      <td width="60px">
                                        <?php 

                                            $ruta_img = "fotos/odontologos/d".$doctor->id_doctor.".jpg"; //
                                            //echo $ruta_img

                                            if(file_exists($ruta_img)) // Debo saber si existe esta foto
                                              {

                                                $ruta_foto = $ruta_img;
                                                //echo $ruta_foto;
                                              
                                              }else{
                                              
                                                //echo "No esta la imagen ".$ruta_img;
                                                $ruta_foto = "fotos/odontologos/avatar.png";

                                              }
                                            
                                        ?>  
                                          <img src="{{ $ruta_foto }}" class="img-circle" alt="User Image" width="56px" height="56px">
                                      </td>
                                      <td>
                                          <strong>{{ $doctor->doctor }}</strong><br />
                                          <?php

                                              $fecha = $doctor->fecha_nacimiento;

                                              $fecha = str_replace("/","-",$fecha);

                                              $fecha = date('Y/m/d',strtotime($fecha));

                                              $hoy = date('Y/m/d');

                                              $edad = $hoy - $fecha;

                                              $nacimiento = date('d/m/Y',strtotime($fecha));

                                          ?>
                                          <i>{{ $nacimiento }} - Edad: {{ $edad }} </i>  <br />
                                          {{ $doctor->telefono_movil }} - {{ $doctor->email }}
                                      </td>
                                    </tr>
                                  
                                  @endforeach
                                </table>
                              </div>
                              @if (!$searchText)

                                {{ $odontologos->render() }}

                              @endif
                            </div>
                          </div>                    
                    <!--Fin Contenido-->
              </div>
            </div>
      		</div>
      	</div><!-- /.row -->
      </div><!-- /.box-body -->
    </div><!-- /.box -->


@endsection