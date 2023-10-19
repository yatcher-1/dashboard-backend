<?php

namespace App\Imports;

use App\Models\ReturnScan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ReturnScanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {   
        return new ReturnScan([
           'awb' => $row['awb'],
           'awb_2' => $row['awb_2'],
           'date' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),
           'courier' => $row['courier'],
           'firm' => $row['firm'],
        ]);
    }
}
