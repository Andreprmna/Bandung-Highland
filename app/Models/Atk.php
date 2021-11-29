<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Atk extends Model
{
    public $table = "atk";
    protected $primaryKey = 'id_atk';
    use HasFactory;
    protected $fillable = [
        'nama_atk',
        'harga',
        'jumlah',
        'deskripsi_atk',
        'status_atk'
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
