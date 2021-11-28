<?php

namespace App\Exports;

use App\Models\Booking_Coworking_space;
use Maatwebsite\Excel\Concerns\FromCollection;

class Booking_Coworking_spaceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking_Coworking_space::all();
    }
}
