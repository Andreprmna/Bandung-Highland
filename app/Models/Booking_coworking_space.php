<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking_coworking_space extends Model
{
    public $table = "booking_coworking_space";
    protected $primaryKey = 'id_bcs';

    use HasFactory;
    protected $fillable = [
        'id_cs',
        'id_member',
        'id_admin',
        'tgl_mulai',
        'tgl_selesai',
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
    public function member()
    {
        return $this->hasOne(Member::class, 'id_member', 'id_member');
    }
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id_admin', 'id_admin');
    }
    public function coworking_space()
    {
        return $this->hasOne(Coworking_space::class, 'id_cs', 'id_cs');
    }
}
