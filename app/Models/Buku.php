<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Buku extends Model
{
    public $table = "buku";
    protected $primaryKey = 'id_buku';
    use HasFactory;
    protected $fillable = [
        'id_pengarang',
        'id_penerbit',
        'judul',
        'tahun_rilis',
        'halaman',
        'isbn',
        'deskripsi',
        'sampul',
        'bentuk',
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->timestamp;
    }
    public function penerbit()
    {
        return $this->hasOne(Penerbit::class, 'id_penerbit', 'id_penerbit');
    }
    public function pengarang()
    {
        return $this->hasOne(Pengarang::class, 'id_pengarang', 'id_pengarang');
    }
}
