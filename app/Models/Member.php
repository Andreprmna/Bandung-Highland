<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Penerbit extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'nama',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'foto_profil',
        'password'
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