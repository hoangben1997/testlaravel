<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DB;
use App\Models\Blogcmt;

class Blogcmt extends Model
{
    use HasFactory;
    protected $table = 'blogcmt';
    protected $fillable = [
        'comment',
        'id_blog',
        'id_user',
        'avatar',
        'name'
        
    ];
    
}