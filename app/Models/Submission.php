<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'publication_id',
        'user_id',
        'content',
        'submitted_at',
        'grade',
        'feedback',
    ];

    // Relación con la publicación
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }

    // Relación con el usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
