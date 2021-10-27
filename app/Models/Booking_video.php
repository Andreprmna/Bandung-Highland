<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking_video extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_video',
        'waktu_mulai',
        'waktu_selesai'
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
    public function video()
    {
        return $this->hasOne(Video::class, 'id_video', 'id_video');
    }
}
