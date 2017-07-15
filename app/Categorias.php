<?php

namespace dentalis;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    //
    protected $table='categorias';

    protected $primaryKey='id_categoria';

    public $timestamps=false;

    protected $fillable [
    	'categoria',
    	'tipo',
    	'status'
    ];

   protected $guarded =[

   ];

}
