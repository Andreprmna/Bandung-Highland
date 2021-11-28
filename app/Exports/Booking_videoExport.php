<?php

namespace App\Exports;

use App\Models\Booking_video;
use Maatwebsite\Excel\Concerns\FromCollection;

class Booking_videoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking_video::all();
    }
}
