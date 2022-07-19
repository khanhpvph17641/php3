<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    // protected $table = 'classrooms';
    protected $filable =[
        'name',
        'desc',
        'code',
        'status',
        'user_id'
    ];

}
