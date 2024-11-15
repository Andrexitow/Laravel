<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    // Define la tabla a la que se refiere el modelo (si el nombre de la tabla no es plural de forma estándar)
    protected $table = 'profiles'; 

    // Define los campos que son asignables en masa
    protected $fillable = [
        'user_id', 
        'nombre', 
        'apellido', 
        'telefono', 
        'direccion', 
        'fecha_nacimiento', 
        'foto_perfil', 
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
