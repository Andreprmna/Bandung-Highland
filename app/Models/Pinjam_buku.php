<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pinjam_buku extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_buku',
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
        return $this->hasOne(Booking_buku::class, 'id', 'id_member');
    }
    public function admin()
    {
        return $this->hasOne(Booking_buku::class, 'id', 'id_admin');
    }
    public function buku()
    {
        return $this->hasOne(Booking_buku::class, 'id', 'id_buku');
    }
    public function waktu_pinjam()
    {
        return $this->hasOne(Booking_buku::class, 'id', 'waktu_mulai');
    }
    public function waktu_pengembalian()
    {
        return $this->hasOne(Booking_buku::class, 'id', 'waktu_selesai');
    }
}
