<?php

namespace App\Exports;

use App\Models\Pinjam_audio;
use Maatwebsite\Excel\Concerns\FromCollection;

class Pinjam_audioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pinjam_audio::all();
    }
}
