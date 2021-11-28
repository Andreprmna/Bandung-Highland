<?php

namespace App\Exports;

use App\Models\Booking_buku;
use Maatwebsite\Excel\Concerns\FromCollection;

class booking_bukuExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking_buku::all();
    }
}
