<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [
        'cliente_id', 
        'persona_contacto',
        'telefono_contacto', 
        'descripcion',
        'email',
        'direccion',
        'codigo_postal',
        'provincia',
        'estado',
        'operario',
        'fecha_creacion',
        'fecha_realizacion',
        'anotaciones_antes',
        'anotaciones_despues'
    ];

    // public function clientes()
    // {
    //     return $this->belongsTo(Cliente::class);
    // }



    public static function getAllTareas()
    {
        // return Tarea::all();
        //return static::query();
        return Tarea::orderBy('created_at', 'desc')->paginate(4);
    }
}
