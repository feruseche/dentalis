@extends('layouts.inicio')
@section('contenido')


          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
                        <!--Contenido-->
                         <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                @if ($searchText)

                                  La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" productos.

                                @endif 
                                
                                @include('vademecum.search')
                                
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-condensed table-hover">
                                  @foreach($vademecum as $producto)

                                    <tr class="info">
                                      <td>
                                            
                                            <?php 

                                                $ruta_img = "fotos/vademecum/".$producto->id_producto.".jpg"; //
                                                //echo $ruta_img

                                                if(file_exists($ruta_img)) // Debo saber si existe esta foto
                                                  {

                                                    $ruta_foto = $ruta_img;
                                                    //echo $ruta_foto;
                                                  
                                                  }else{
                                                  
                                                    //echo "No esta la imagen ".$ruta_img;
                                                    $ruta_foto = "fotos/vademecum/avatar.png";

                                                  }


                                                
                                            ?>  
                                            <img src="{{ $ruta_foto }}" class="img-rounded" alt="User Image" width="84px" height="56px">
                                          <strong>{{ $producto->producto }}</strong>
                                      </td>
                                      
                                    </tr>
                                    <tr>

                                      <td>

                                          @foreach($grupos as $grupo)

                                            <?php

                                                if($producto->id_grupo == $grupo->id_grupo)

                                                  {
                                                      echo "<small>(".$grupo->grupo.")</small><br />";
                                                  }

                                            ?>

                                          @endforeach

                                          <ul>

                                          @foreach($dosis as $dosi)

                                            <?php

                                                if($dosi->id_producto == $producto->id_producto)

                                                  {
                                                      echo "<li><i><small>".$dosi->dosis."</small></i></li>";
                                                  }

                                            ?>

                                          @endforeach

                                          </ul>
                                      </td>
                                    </tr>
                                  
                                  @endforeach
                                </table>
                              </div>
                              @if (!$searchText)

                                {{ $vademecum->render() }}

                              @endif
                            </div>
                          </div>
		                          <!--Fin Contenido-->
                      </div>
                    </div>
		            </div>
              </div><!-- /.row -->
            </div><!-- /.col -->
          </div><!-- /.row -->

@endsection