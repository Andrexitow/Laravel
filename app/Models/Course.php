<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'title', 
        'description',
        'start_date',
        'end_date',
        'is_active', 
    ];

    /**
     * Relación: Un curso tiene muchas publicaciones.
     */
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function users()
{
    return $this->belongsToMany(User::class, 'course_user');
}

}
