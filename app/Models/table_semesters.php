<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_semesters extends Model
{
    use HasFactory;

    protected $fillable = [
        'sem_id',
        'sem_number',
    ];
}
