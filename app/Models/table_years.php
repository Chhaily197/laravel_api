<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class table_years extends Model
{
    use HasFactory;

    protected $fillable = [
        'year_id',
        'year_number',
    ];
}
