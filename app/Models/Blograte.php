<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DB;
use App\Models\Blograte;

class Blograte extends Model
{
    use HasFactory;
    protected $table = 'blograte';
    protected $fillable = [
        'rate',
        'id_blog',
        'id_user',
        'name'
        
    ];
    
}