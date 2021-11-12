<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pinjam_audio extends Model
{
    public $table = "pinjam_audio";
    protected $primaryKey = 'id_pinjam_audio';
    use HasFactory;
    protected $fillable = [
        'id_member',
        'id_admin',
        'id_audio',
        'tgl_pinjam',
        'tgl_kembali',
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
    public function audio()
    {
        return $this->hasOne(Audio::class, 'id_audio', 'id_audio');
    }
}
