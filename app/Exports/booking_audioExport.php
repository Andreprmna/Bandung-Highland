<?php

namespace App\Exports;

use App\Models\Booking_audio;
use Maatwebsite\Excel\Concerns\FromCollection;

class booking_audioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Booking_audio::all();
    }
}
