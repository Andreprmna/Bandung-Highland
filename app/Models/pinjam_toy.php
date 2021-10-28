<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class pinjam_toy extends Model
{
    protected $primaryKey = 'id_pinjam_toy';
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_toy',
        'waktu_mulai',
        'waktu_selesai',
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
    public function toy()
    {
        return $this->hasOne(Toy::class, 'id_toy', 'id_toy');
    }
}
