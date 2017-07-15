{!! Form::open(array('url'=>'vademecum.filtro','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="escriba un producto..." value="<?php if($searchText){echo $searchText;} ?>">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-info">Filtrar</button> 
		</span>
	</div>
</div>
{{Form::close()}}