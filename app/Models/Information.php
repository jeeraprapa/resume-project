<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $table = 'information';
    protected $fillable = [
        'name',
        'job',
        'email',
        'phone',
        'address',
        'description',
        'github',
        'status',
    ];
}
