<?php

namespace dentalis;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //
  protected $table='pacientes_recipes';

    protected $primaryKey='id_recipe';

    public $timestamps=false;


    protected $fillable =[
        'historia',
    	'paciente',
    	'cedula',
    	'direccion'
    ];

    protected $guarded =[

    ];

    public function scopeRecetas($query, $id){

        return $query->where('historia',$id)->orderBy('fecha','desc');

    }    
}
