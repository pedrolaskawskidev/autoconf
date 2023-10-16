<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = true;


    protected $table = "brands";

    protected $fillable = [
        'name',
        'image'
    ];
}
