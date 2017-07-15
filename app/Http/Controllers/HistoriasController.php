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


 public function show(Request $id)
    {

				//dd($id);

	        	//$idh=trim($id);
	            $historias=DB::table('pacientes')
					->where('historia','=',$id);

		        $nr=$historias->count();

		        return view('historias.historia',["historias"=>$historias,"searchText"=>"l","nr"=>$nr]);
	        	//return (["historias"=>$historias]);
        	
        	//return view("historias.show")->with(['id' => $id]);
        	//,["historia"=>pacientes::findOrFail($id)]);
    
    }

}
