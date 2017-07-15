@extends ('layouts.inicio')
@section ('contenido')

<section class="content">

          <div class="row">
            <div class="col-md-12">
              <div class="box">

                <div class="box-header with-border">
                	@if ($searchText)
                		si viene searchText {{ $searchText }}
                	@endif
                	
                	@if ($nr)
                		si viene nr {{ $nr }}
                	@endif

                	@if ($historias)
                		si viene historias 
                		 
                	@endif


                  <h3 class="box-title">Historia de </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                		
                </div>

                <!-- /.box-header -->
                <div class="box-body">

					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<h3>Historia: </h3>
							<h2>Paciente: </h2>

				            <div class="form-group">
				            	<label for="nombre">Nombre</label>
				            	<input type="text" name="nombre" class="form-control" value="" placeholder="Paciente">
				            </div>

				            <div class="form-group">
				            	<label for="descripcion">Dirección</label>
				            	<input type="text" name="descripcion" class="form-control" value="" placeholder="Dirección">
				            </div>

				            <div class="form-group">
				            	<button class="btn btn-primary" type="submit">Guardar</button>
				            	<button class="btn btn-danger" type="reset">Cancelar</button>
				            </div>

				            
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection