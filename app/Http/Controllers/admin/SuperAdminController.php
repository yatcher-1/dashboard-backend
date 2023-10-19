<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function Dashboard(){
        return view('backend.super_admin.index_super_admin');
    }//end method

    public function UserProfile(){
        $adminData = auth()->user();
        return view('backend.super_admin.super_admin_profile', compact('adminData'));
    }//end method
}
