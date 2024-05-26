<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\DataBarang;
use Maatwebsite\Excel\Excel;

class ExportBarang implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataBarang::all();
    }
}
