<?php

namespace App\Exports;

use App\Models\point_of_sell;
use Maatwebsite\Excel\Concerns\FromCollection;

class Point_of_sellExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return point_of_sell::all();
    }
}
