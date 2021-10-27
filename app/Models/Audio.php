<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Audio extends Model
{
    protected $primaryKey = 'id_audio';
    use HasFactory;
    protected $fillable = [
        'judul',
        'pengisi_suara',
        'tahun_rilis',
        'genre',
        'durasi',
        'format',
        'cover'
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
