<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    //no se guarde de manera masiva

    public function user(){
        //un estudiante pertenece a un usuario
        return $this->belongsTo(User::class, 'id_usuario');
    }
    public function carrera(){
        //un estuduante pertene aun carrera
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }
}
