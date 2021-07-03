<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Uuid;

    protected $fillable = ['name', 'is_active'];

    protected $casts = ['id' => 'string'];

    protected $dates = ['deleted_at'];



}
