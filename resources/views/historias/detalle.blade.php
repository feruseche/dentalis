@extends('layouts.inicio')
@section('contenido')


<section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">

                <div class="box-header with-border">
                  @foreach($historias as $paciente)

                    <h1 class="box-title">Historia #00000{{ $paciente->historia }} - Datos Personales del Paciente</h1>

                  @endforeach
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                        <!--Contenido-->
                        <div class="row">

                          <!-- <div class="row"> -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-condensed table-hover">
                                  @foreach($historias as $paciente)

                                    <tr>
                                      <td width="60px">
                                            
                                            <?php 
                                            //ruta del odontograma
                                                $ruta_odontograma = "fotos/odontogramas/".$paciente->historia.".bmp";

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
                                            <img src="{{ $ruta_foto }}" class="img-circle" alt="User Image" width="98px" height="98px">
                                      </td>
                                      <td>
                                          <strong>{{ $paciente->paciente }}</strong><br />


                                          <?php

                                              $fecha = $paciente->fecha_nacimiento;

                                              $fecha = str_replace("/","-",$fecha);

                                              $fecha = date('Y/m/d',strtotime($fecha));

                                              $hoy = date('Y/m/d');

                                              $edad = $hoy - $fecha;

                                              $nacimiento = date('d/m/Y',strtotime($fecha));


                                          ?>
                                          <i>Fecha de Nacimiento: {{ $nacimiento }} - Edad: {{ $edad }} años</i><br />
                                          <i>Teléfono fijo: {{ $paciente->telefonos }} - Celular: {{ $paciente->telefono_movil }}</i>
                                          <i>Email: {{ $paciente->email }}</i>
                                          <br />
                                          <i>Dirección: {{ $paciente->direccion }}</i><br />
                                          <i>Ocupación: {{ $paciente->ocupacion }}</i>                                          
                                      </td>
                                      <td>
                            
                                      </td>
                                    </tr>
                                  
                                  @endforeach
                                </table>
                              </div>
                            </div>
                        </div>                            
                      </div>

                              <!--Fin Contenido-->
                    </div>
                </div>

              </div><!-- /.box -->
            </div><!-- /.col-md-12 -->
          </div><!-- /.row -->





    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
              <h1 class="box-title">Anamnesis</h1>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!--Contenido-->
                   <div class="row">
                    <!-- <div class="row"> -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                            <tr>
                              <td>
                              <ul>
                                    @foreach($patologias as $patologia)

                                      <?php
                                        $patog=trim($patologia->id_patologia);
                                      ?>
                                      
                                      @foreach($pacientes_patologias as $patologia_paciente)
                                      
                                      <?php
                                        $patop=trim($patologia_paciente->id_patologia);
                                        if($patog == $patop )
                                          {
                                      ?>
                                            <li>
                                              
                                              <strong>{{ $patologia->patologia }}=> </strong> <i>{{ $patologia_paciente->valor }}</i>
                                              
                                            </li>  
                                      <?php
                                          }
                                      ?>      
                                      @endforeach  

                                    @endforeach

                                </ul>
                              </td>
                            </tr>                            
                          </table>
                        </div>
                      </div>
                    </div>                            
                    </div>
                        <!--Fin Contenido-->
                </div>
              </div>
        </div><!-- /.box -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->





    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
              <h1 class="box-title"> @if ($nr) <strong>{{ $nr }}</strong> @endif Tratamientos Registrados</h1>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!--Contenido-->
                   <div class="row">
                    <!-- <div class="row"> -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                            <tr class="success" style="background-color: #">
                            <th>FECHA</th><th>PIEZA</th><th>TRATAMIENTO</th><th>ESTATUS</th><th>FECHA INICIO</th><th>FECHA FINALIZADO</th><th>PRECIO</th><th>ABONOS</th><th>SALDO</th>
                            </tr>
                            @foreach($tratamientos as $tratamiento) 
                            <?php
                                  if (($tratamiento->status == 'F') && ($tratamiento->saldo > 0))
                                  {
                                    echo "<tr class='success'>";
                                  }                                    

                                  if (($tratamiento->status == 'PR'))
                                  {
                                    echo "<tr class='danger'>";
                                  }

                                  if (($tratamiento->status == 'F') && ($tratamiento->saldo == 0))
                                  {
                                    echo "<tr class='info'>";
                                  }                                

                                  if (($tratamiento->status == 'BE') or ($tratamiento->status == 'LS'))
                                  {
                                    echo "<tr>";
                                  }                                

                            ?>
                              
                                <td>
                                <?php echo date('d-m-Y', strtotime($tratamiento->fecha)); ?>
                                </td>
                                <td>
                                  {{ $tratamiento->pieza_dental }}
                                </td>
                                <td>
                                  {{ $tratamiento->tratamiento }}
                                </td>
                                <td>
                                  {{ $tratamiento->status }}
                                </td>
                                <td>
                                  <?php 
                                        if(!empty($tratamiento->fecha_iniciado)) {echo date('d-m-Y', strtotime($tratamiento->fecha_iniciado));}; ?>
                                </td>
                                <td>
                                  <?php 
                                        if(!empty($tratamiento->fecha_final)) {echo date('d-m-Y', strtotime($tratamiento->fecha_final));}; ?>
                                </td>
                                <td align="right">
                                <?php echo number_format($tratamiento->precio, 0, ',', '.'); ?>
                                </td>
                                <td align="right">
                                <?php echo number_format($tratamiento->pagado, 0, ',', '.'); ?>
                                </td>
                                <td align="right">
                                <?php echo number_format($tratamiento->saldo, 0, ',', '.'); ?>
                                </td>
                              </tr>
                            @endforeach
                          </table>
                        </div>
                      </div>
                    </div>                            
                    </div>
                        <!--Fin Contenido-->
                </div>
              </div>
        </div><!-- /.box -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->


    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            @foreach($historias as $paciente)
              <h1 class="box-title">Odontograma</h1>
            @endforeach
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!--Contenido-->
                   <div class="row">
                    <!-- <div class="row"> -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                            @foreach($historias as $paciente)
                              <tr>
                                <td width="60px">
                                  <img src="{{ $ruta_odontograma }}" class="img-rounded" alt="User Image" width="936px" height="601px">    
                                </td>
                              </tr>
                            @endforeach
                          </table>
                        </div>
                      </div>
                    </div>                            
                    </div>
                        <!--Fin Contenido-->
                </div>
              </div>
        </div><!-- /.box -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->




    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            @foreach($historias as $paciente)
              <h1 class="box-title">Imagenología</h1>
            @endforeach
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!--Contenido-->
                   <div class="row">
                    <!-- <div class="row"> -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                            @foreach($historias as $paciente)
                              <tr>
                                <td width="60px">
                                </td>
                                <td>
                                    <strong>{{ $paciente->paciente }}</strong><br />
                                </td>
                                <td>                      
                                </td>
                              </tr>
                            @endforeach
                          </table>
                        </div>
                      </div>
                    </div>                            
                    </div>
                        <!--Fin Contenido-->
                </div>
              </div>
        </div><!-- /.box -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->





    <div class="row">
      <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            @foreach($historias as $paciente)
              <h1 class="box-title">Recetas Médicas</h1>
            @endforeach
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <!--Contenido-->
                   <div class="row">
                    <!-- <div class="row"> -->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-responsive">
                          <table class="table table-condensed table-hover">
                            @foreach($historias as $paciente)
                              <tr>
                                <td width="60px">
                                </td>
                                <td>
                                    <strong>{{ $paciente->paciente }}</strong><br />
                                </td>
                                <td>                      
                                </td>
                              </tr>
                            @endforeach
                          </table>
                        </div>
                      </div>
                    </div>                            
                    </div>
                        <!--Fin Contenido-->
                </div>
              </div>
        </div><!-- /.box -->
      </div><!-- /.col-md-12 -->
    </div><!-- /.row -->
</section>

@endsection