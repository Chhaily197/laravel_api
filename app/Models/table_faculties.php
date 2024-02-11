<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_faculties extends Model
{
    use HasFactory;

    protected $fillable = [
        'faculty_id',
        'faculty_name',
    ];
}
