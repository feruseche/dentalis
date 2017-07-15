<?php

namespace dentalis\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;




class ServiciosController extends Controller
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
		            $servicios=DB::table('tratamientos')
						->where('tratamiento','LIKE','%'.$query.'%')
	                    ->orWhere('clase','LIKE','%'.$query.'%')
			            ->orderBy('tratamiento','asc')
			            ->paginate(20);

			        $nr=$servicios->count();

			        return view('servicios.index',["servicios"=>$servicios,"searchText"=>$query,"nr"=>$nr]);
		        }

    }
 
 public function filtro(Request $request)
    {

		if ($request)
		        {
		            $query=trim($request->get('searchText'));
		            $servicios=DB::table('tratamientos')
						->where('tratamiento','LIKE','%'.$query.'%')
	                    ->orWhere('clase','LIKE','%'.$query.'%')
			            ->orderBy('tratamiento','asc')
			            ->paginate(500);

			        $nr=$servicios->count();

			        return view('servicios.index',["servicios"=>$servicios,"searchText"=>$query,"nr"=>$nr]);
		        }

    }    

 
}
