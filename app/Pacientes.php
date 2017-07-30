<?php

namespace dentalis;

use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    //

    protected $table='pacientes';

    protected $primaryKey='historia';

    public $timestamps=false;


    protected $fillable =[
        'historia',
    	'paciente',
    	'cedula',
    	'direccion'
    ];

    protected $guarded =[

    ];

}
