<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;

    public $timestamps = false;
    public $incrementing = true;
    
    protected $table = "vehicle_models";
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'name',
        'brand_id',
    ];
}
