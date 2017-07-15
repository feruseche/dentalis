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

                                  La lista está filtrada por el texto "{{ $searchText }}"   y se encontraron "{{ $nr }}" servicios.

                                @endif 
                                
                                @include('servicios.search')
                                
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-striped table-condensed table-hover">
                                  @foreach($servicios as $servicio)

                                    <tr>
                                      <td>
                                          <strong>{{ $servicio->tratamiento }}</strong><br />
                                          <i>00000{{ $servicio->id_tratamiento }} - {{ $servicio->clase }} - (Bs.F {{$servicio->precio_base }})</i><br />

                                      </td>
                                    </tr>
                                  
                                  @endforeach
                                </table>
                              </div>
                              @if (!$searchText)

                                {{ $servicios->render() }}

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