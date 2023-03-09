<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cif',
        'nombre',
        'telefono',
        'correo',
        'cuenta_corriente',
        'pais',
        'moneda',
        'importe'
    ];

  
    public static function getClientes()
    {
        // return self::paginate(4);
        return self::all();
    }


    // public function tareas()
    // {
    //     return $this->hasMany(Tarea::class);
    // }

    public function cuotas()
    {
        return $this->hasMany(Cuota::class);
    }
}
