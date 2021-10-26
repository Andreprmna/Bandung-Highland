<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coworking_space_properties extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_cs',
        'id_property'
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    public function coworking_space()
    {
        return $this->hasOne(coworking_space::class, 'id_cs', 'id_cs');
    }
    public function properties()
    {
        return $this->hasOne(properties::class, 'id_property', 'id_property');
    }
}
