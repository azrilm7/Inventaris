<?php

namespace App\Exports;

use App\Models\DataPemakaian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;

class ExportPemakaian implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataPemakaian::all();
    }
}
