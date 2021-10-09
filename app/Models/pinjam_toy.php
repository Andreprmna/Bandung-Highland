<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class pinjam_toy extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_toy',
        'waktu_mulai',
        'waktu_selesai',
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
        return $this->hasOne(Booking_toy::class, 'id', 'id_member');
    }
    public function pengarang()
    {
        return $this->hasOne(Booking_toy::class, 'id', 'id_admin');
    }
    public function toy()
    {
        return $this->hasOne(Booking_toy::class, 'id', 'id_toy');
    }
    public function waktu_pinjam()
    {
        return $this->hasOne(Booking_toy::class, 'id', 'waktu_mulai');
    }
    public function waktu_pengembalian()
    {
        return $this->hasOne(Booking_toy::class, 'id', 'waktu_selesai');
    }
}
