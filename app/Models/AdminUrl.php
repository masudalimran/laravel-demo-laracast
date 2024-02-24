<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUrl extends Model
{
    use HasFactory;

    protected $guarded = ["id"];
    protected $fillable = [
        'url'
    ];

    // public Function
}
