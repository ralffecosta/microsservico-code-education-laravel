<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $fillable = ['name', 'description', 'is_active'];

    //Para uso em api é necessário fazer um cast para retornar uma string
    protected $casts = [
        'id' => 'string'
    ];

    //Para não receber uma string e sim uma data
    protected $dates = ['deleted_at']; 

    
}
