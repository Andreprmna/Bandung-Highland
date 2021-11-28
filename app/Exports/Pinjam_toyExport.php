<?php

namespace App\Exports;

use App\Models\pinjam_toy;
use Maatwebsite\Excel\Concerns\FromCollection;

class Pinjam_toyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pinjam_toy::all();
    }
}
