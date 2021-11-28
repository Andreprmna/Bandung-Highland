<?php

namespace App\Exports;

use App\Models\Atk;
use Maatwebsite\Excel\Concerns\FromCollection;

class AtkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Atk::all();
    }
}
