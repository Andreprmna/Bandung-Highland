<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Point_of_sell extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_atk',
        'jumlah_pos',
        'total_harga',
        'tgl_pos'
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
        return $this->hasOne(Booking_video::class, 'id', 'id_member');
    }
    public function admin()
    {
        return $this->hasOne(Booking_video::class, 'id', 'id_admin');
    }
    public function atk()
    {
        return $this->hasOne(Atk::class, 'id', 'id_atk');
    }
}
