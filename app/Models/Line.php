<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [];

    protected $dates = ['deleted_at'];
}
