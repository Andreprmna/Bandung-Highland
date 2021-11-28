<?php

namespace App\Exports;

use App\Models\Pinjam_video;
use Maatwebsite\Excel\Concerns\FromCollection;

class Pinjam_videoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pinjam_video::all();
    }
}
