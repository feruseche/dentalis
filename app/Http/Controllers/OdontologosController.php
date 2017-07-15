<?php

namespace dentalis\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;




class OdontologosController extends Controller
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
		            $odontologos=DB::table('profesionales')
						->where('doctor','LIKE','%'.$query.'%')
	                    ->orWhere('cedula','LIKE','%'.$query.'%')
			            ->orderBy('doctor','asc')
			            ->paginate(100);

			        $nr=$odontologos->count();

			        return view('odontologos.index',["odontologos"=>$odontologos,"searchText"=>$query,"nr"=>$nr]);
		        }

    }

 
}
