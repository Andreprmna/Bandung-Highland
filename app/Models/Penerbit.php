<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penerbit extends Model
{
    public $table = "penerbit";
    protected $primaryKey = 'id_penerbit';
    use HasFactory;
    protected $fillable = [
        'nama_penerbit',
        'status'
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
