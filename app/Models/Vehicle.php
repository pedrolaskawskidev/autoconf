<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = true;

    protected $table = "vehicles";
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'fuel',
        'color',
        'price',
        'doors',
        'manufacturing_year',
        'model_year',
        'plate',
        'motor',
        'mileage',
        'brand_id',
        'vehicle_model_id',
        'image'
    ];
}
