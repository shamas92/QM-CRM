<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class defect extends Model
{
    use HasFactory;
    protected $fillable = [
        'defect_title', 
        'description',
    ];
}
