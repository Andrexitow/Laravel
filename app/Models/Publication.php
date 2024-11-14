<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'publications'; 

    protected $fillable = [
        'course_id',
        'user_id',
        'title',
        'content',
        'deadline',
        'is_active',
    ];

    /**
     * Relación: Una publicación pertenece a un curso.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
