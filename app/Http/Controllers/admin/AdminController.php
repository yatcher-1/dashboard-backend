<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function UserProfile(){
        $adminData = auth()->user();
        return view('backend.admin.admin_profile', compact('adminData'));
    }//end method

    public function Dashboard(){
        return view('backend.admin.index');
    }//end method
}
