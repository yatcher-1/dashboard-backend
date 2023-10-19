<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function UserProfile(){
        $adminData = auth()->user();
        return view('backend.staff.staff_profile', compact('adminData'));
    }//end method

    public function Dashboard(){
        return view('backend.staff.index_staff');
    }//end method
}
