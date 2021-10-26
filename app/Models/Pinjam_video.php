<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pinjam_video extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_video',
        'tgl_pinjam',
        'tgl_kembali',
        'tgl_pengembalian',
        'denda'
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    public function member()
    {
        return $this->hasOne(Member::class, 'id', 'id_member');
    }
    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'id_admin');
    }
    public function video()
    {
        return $this->hasOne(Video::class, 'id', 'id_video');
    }
}
