<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CLoudflare extends Model
{
    use HasFactory;
    protected $table = 'CLoudflare';
    protected $fillable = [
        'tenmien',
        'target',
        'type'  
    ];
}
