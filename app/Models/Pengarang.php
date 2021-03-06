<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Pengarang extends Model
{
    public $table = "pengarang";
    protected $primaryKey = 'id_pengarang';
    use HasFactory;
    protected $fillable = [
        'nama_pengarang',
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
}
