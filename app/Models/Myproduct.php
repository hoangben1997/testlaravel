<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DB;
use App\Models\Myproduct;

class Myproduct extends Model
{
    use HasFactory;
    protected $table = 'myProduct';
    protected $fillable = [
        'name',
        'price',
        'id_category',
        'id_brand',
        'status',
        'sale',
        'company',
        'avatar',
        'detail'
        
    ];
    
}