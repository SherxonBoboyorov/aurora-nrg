<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Callback extends Model
{
    use HasFactory;

    protected $table = 'callbacks';

    protected $fillable = [
        'name',
        'phone',
        'address',
        'email',
        'message'
    ];
}
