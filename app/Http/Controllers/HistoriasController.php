<?php

namespace dentalis\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;

class HistoriasController extends Controller
{
    //

  public function __construct()
    {

    }

  public function index(Request $request)
    {

		if ($request)
		        {
		            $query=trim($request->get('searchText'));
		            $historias=DB::table('pacientes')
			            ->orderBy('historia','asc')
			            ->paginate(10);

			        
			        //consulta en formato eloquent.
			        //$consulta=Pacientes::orwhere('paciente','LIKE','%'.$query.'%')->orwhere('cedula','LIKE','%'.$query.'%')->orderBy('historia','asc')->paginate(2); 
			        

			        $nr=$historias->count();

			        return view('historias.historia',["historias"=>$historias,"searchText"=>$query,"nr"=>$nr]);
		        }

    }


 public function filtro(Request $request)
    {

		if ($request)
		        {
		            $query=trim($request->get('searchText'));
		            $historias=DB::table('pacientes')
						->where('paciente','LIKE','%'.$query.'%')
	                    ->orWhere('cedula','LIKE','%'.$query.'%')
			            ->orderBy('historia','asc')
			            ->paginate(500);

			        $nr=$historias->count();

			        return view('historias.historia',["historias"=>$historias,"searchText"=>$query,"nr"=>$nr]);
		        }

    }


 public function show($id)
    {
	            
        $historias=DB::table('pacientes')
			->where('historia','=',$id)
			->orderBy('historia','asc')
	        ->paginate(5);

	    $pacientes_patologias=DB::table('pacientes_patologias')
			->where('historia','=',$id)
			->orderBy('id_patologia','asc')
	        ->paginate(50);

	    $patologias=DB::table('patologias')
			->orderBy('id_patologia','asc')
	        ->paginate(500);			    
	    	 
	    $tratamientos=DB::table('presupuestos')
	    	->where('historia','=',$id)
			->orderBy('fecha','ASC')
			->paginate(500);

	    $recetasp=DB::table('pacientes_recipes')
	    	->where('historia','=',$id)
			->orderBy('fecha','DESC')
			->paginate(500);

	    $recetas1=DB::table('pacientes_recipes')
	    	->where('historia','=',$id)
			->orderBy('id_recipe','DESC')
			->paginate(500);

		$recetas2=DB::table('pacientes_recipes as pr')
			->join('pacientes_recipes_productos as prp','pr.id_recipe','=','prp.id_recipe')
			->where('pr.historia',$id)
			->orderBy('fecha','DESC')
			->select('pr.id_recipe','pr.fecha','pr.hora','pr.doctor','pr.codigo1','pr.codigo2','pr.indicaciones','prp.producto','prp.dosis')
			->paginate(500);

	    //dd($recetasp->count());
	    	 
	    	//->join('pacientes', 'pp.historia','=', $id)
	    	//->join('patologias as p','p.id_patologia','=','pp.id_patologia')
	    	//->select('pacientes.paciente','pp.historia','p.patologia','pp.valor');

        $nr=$tratamientos->count();

        return view('historias.detalle',["historias"=>$historias,"tratamientos"=>$tratamientos,"patologias"=>$patologias,"pacientes_patologias"=>$pacientes_patologias,"recetas1"=>$recetas1,"recetas2"=>$recetas2,"nr"=>$nr]);
	        	    
    }

}
