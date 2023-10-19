<?php

namespace App\Http\Controllers\AdminStaff;

use App\Http\Controllers\Controller;
use App\Imports\ReturnScanImport;
use App\Imports\ScanDataImport;
use App\Models\DataScan;
use App\Models\ReturnScan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function GetAllOrder(){
        return view('backend.staff.data.add_order_scan');
    }

    public function GetAllScan(){
        $scan = DataScan::latest()->get();
        return view('backend.staff.data.view_order_scan', compact('scan'));
    } //end method
    
    public function DeleteAllScan(){
        DataScan::truncate();
        return redirect()->back();
    } //end method

    public function StoreOrder(Request $request){
        $file = $request->file('scan'); 
        Excel::import(new ScanDataImport, $file);
        return back()->withStatus('Excel done');
    }

    public function GetAllReturn(){
        return view('backend.staff.return_data.add_return_scan');
    }

    public function GetAllReturnScan(){
        $returnscan = ReturnScan::latest()->get();
        return view('backend.staff.return_data.view_return_scan', compact('returnscan'));
    } //end method
    
    public function DeleteAllReturnScan(){
        ReturnScan::truncate();
        return redirect()->back();
    } //end method

    public function StoreReturn(Request $request){
        $file = $request->file('returnscan'); 
        Excel::import(new ReturnScanImport, $file);
        return back()->withStatus('Excel done');
    }

}
