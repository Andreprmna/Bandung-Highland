<?php

namespace App\Exports;

use App\Models\Booking_toy;
use Maatwebsite\Excel\Concerns\FromCollection;

class Booking_toyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking_toy::all();
    }
}
