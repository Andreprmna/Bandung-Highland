<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coworking_space extends Model
{
    public $table = "coworking_space";
    protected $primaryKey = 'id_cs';
    use HasFactory;
    protected $fillable = [
        'nomor_cs',
        'deskripsi_cs',
        'daya_tampung'
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
}
