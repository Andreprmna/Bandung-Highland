<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Audio extends Model
{
    public $table = "audio";
    protected $primaryKey = 'id_audio';
    use HasFactory;
    protected $fillable = [
        'judul',
        'pengisi_suara',
        'tahun_rilis',
        'genre',
        'durasi',
        'format',
        'cover',
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
