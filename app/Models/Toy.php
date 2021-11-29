<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Toy extends Model
{
    public $table = "toy";
    protected $primaryKey = 'id_toy';
    use HasFactory;
    protected $fillable = [
        'nama_toy',
        'jenis',
        'genre',
        'deskripsi',
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
