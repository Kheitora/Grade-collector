<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'grade',
        'subject',
        'status',

    ];
}
