<?php

namespace dentalis\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;

use Illuminate\Http\Request;



class VademecumController extends Controller
{
    //

  public function __construct()
    {

    }

  public function index(Request $request)
    {

		if ($request)
	        {
	            $query = trim($request->get('searchText'));
	            $vademecum = DB::table('vademecum_productos')
							->where('producto','LIKE','%'.$query.'%')
		        			->orderBy('id_producto','asc')
		        			->paginate(500);


				$dosis = DB::table('vademecum_dosis')
							//->where('producto','LIKE','%'.$query.'%')
		        			->orderBy('id_producto','asc')
		        			->paginate(500);

				$grupos = DB::table('vademecum_grupos')
							//->where('producto','LIKE','%'.$query.'%')
		        			->orderBy('id_grupo','asc')
		        			->paginate(500);

				//	DB::table('vademecum_productos')
				//		->join('vademecum_dosis', 'vademecum_dosis.id_producto', '=', 'vademecum_productos.id_producto', 'inner', false)
				//		->select(['vademecum_productos.*', 'vademecum_dosis.id_producto as id_pro', 'vademecum_dosis.dosis'])
				//		->where('vademecum_productos.id_producto', '=', '2')
				//		->orderBy('vademecum_productos.id_producto','asc');;
		        $nr=$vademecum->count();
		        return view('vademecum.index',["vademecum"=>$vademecum,"dosis"=>$dosis,"grupos"=>$grupos,"searchText"=>$query,"nr"=>$nr]);
	        }

    }     

public function filtro(Request $request)
    {

		if ($request)
		        {
		           $query = trim($request->get('searchText'));
		            $vademecum = DB::table('vademecum_productos')
								->where('producto','LIKE','%'.$query.'%')
			        			->orderBy('id_producto','asc')
			        			->paginate(500);

					$dosis = DB::table('vademecum_dosis')
								//->where('producto','LIKE','%'.$query.'%')
			        			->orderBy('id_producto','asc')
			        			->paginate(500);

					$grupos = DB::table('vademecum_grupos')
								//->where('producto','LIKE','%'.$query.'%')
			        			->orderBy('id_grupo','asc')
			        			->paginate(500);		        		

			        $nr=$vademecum->count();

			    	return view('vademecum.index',["vademecum"=>$vademecum,"dosis"=>$dosis,"grupos"=>$grupos,"searchText"=>$query,"nr"=>$nr]);
		        }

    }    

 
}
