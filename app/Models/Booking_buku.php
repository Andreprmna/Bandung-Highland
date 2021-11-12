<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking_buku extends Model
{
    public $table = "booking_buku";
    protected $primaryKey = 'id_booking_buku';
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_buku',
        'tgl_mulai',
        'tgl_selesai'
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
        return $this->hasOne(Member::class, 'id_member', 'id_member');
    }
    public function admin()
    {
        return $this->hasOne(User::class, 'id', 'id_admin');
    }
    public function buku()
    {
        return $this->hasOne(Buku::class, 'id_buku', 'id_buku');
    }
}
