<?php

namespace App\Exports;

use App\Models\Pinjam_buku;
use Maatwebsite\Excel\Concerns\FromCollection;

class Pinjam_bukuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pinjam_buku::all();
    }
}
