@extends('layouts.inicio')
@section('contenido')

{{ $historias }}



      <section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Historias de Pacientes</h3>
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
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <h3>Listado de Historias 
                                  
                                  @include('historias.search')

                            </div>
                          </div>

                          <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="table-responsive">
                                <table class="table table-striped table-bordered table-condensed table-hover">
                                  <thead>
                                    <th>Historia</th>
                                    <th>Paciente</th>
                                    <th>Cédula</th>
                                    <th>Opciones</th>
                                  </thead>
                                  @foreach ($historias as $historia)
                                    <tr>
                                      <td>{{ $historia->historia }}</td>
                                      <td>{{ $historia->paciente }}</td>
                                      <td>{{ $historia->cedula }}</td>
                                      <td>
                                        <a href=""><button class="btn btn-info">Consultar</button></a>
                                      </td>
                                    </tr>
                                  <!-- @include('almacen.categoria.modal') -->
                                  @endforeach
                                </table>
                              </div>
                              {{ $historias->render() }}
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