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
						->where('paciente','LIKE','%'.$query.'%')
	                    ->orWhere('cedula','LIKE','%'.$query.'%')
			            ->orderBy('historia','asc')
			            ->paginate(10);

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

    			//dd($id);
    			//return view("historias.historia.show",["historia"=>Historias::findOrFail($id)]);
	            
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

			    $pruebadejoin=DB::table('pacientes_patologias as pp')
			    	 ->join('pacientes', 'pp.historia','=', $id)
			    	 ->join('patologias as p','p.id_patologia','=','pp.id_patologia')
			    	 ->select('pacientes.paciente','pp.historia','p.patologia','pp.valor');
			    	 
			    $tratamientos=DB::table('presupuestos')
			    	->where('historia','=',$id)
					->orderBy('fecha','ASC')
					->paginate(500);

		        $nr=$tratamientos->count();
				
				//dd($prueba);
				//return $prueba->pacientes.paciente;

		        return view('historias.detalle',["historias"=>$historias,"tratamientos"=>$tratamientos,"patologias"=>$patologias,"pacientes_patologias"=>$pacientes_patologias,"nr"=>$nr]);
	        	
        	
        	
    
    }

}
