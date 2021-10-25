<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pinjam_audio extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_audio',
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
        return $this->hasOne(Booking_audio::class, 'id', 'id_member');
    }
    public function admin()
    {
        return $this->hasOne(Booking_audio::class, 'id', 'id_admin');
    }
    public function audio()
    {
        return $this->hasOne(Booking_audio::class, 'id', 'id_audio');
    }
    public function waktu_pinjam()
    {
        return $this->hasOne(Booking_audio::class, 'id', 'waktu_mulai');
    }
    public function waktu_pengembalian()
    {
        return $this->hasOne(Booking_audio::class, 'id', 'waktu_selesai');
    }
}