<?php

namespace App\Imports;

use App\Models\DataScan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScanDataImport implements ToModel, WithHeadingRow //, WithMapping, WithColumnFormatting
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {   
        return new DataScan([
           'portal' => $row['portal'],
           'courier' => $row['courier'],
           'date' =>  \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date']),
           'firm' => $row['firm'],
           'order_id' => $row['order_id'],
           'awb' => $row['awb'],
           'portal_sku' => $row['portal_sku'],
           'qty' => $row['qty'],
        ]);
        
    }
}
