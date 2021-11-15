<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Video extends Model
{
    public $table = "video";
    protected $primaryKey = 'id_video';
    use HasFactory;
    protected $fillable = [
        'judul',
        'tahun_rilis',
        'genre',
        'durasi',
        'deskripsi',
        'format',
        'cover',

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
