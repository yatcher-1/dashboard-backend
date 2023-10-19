<?php

namespace App\Http\Controllers\AdminStaff;

use App\Http\Controllers\Controller;
use App\Models\portal;
use Illuminate\Http\Request;
use Image;

class PortalController extends Controller
{
     public function GetAllPortal(){
         $portal = portal::latest()->get();
         return view('backend.staff.portal.portal', compact('portal'));
     } //end method
 
     public function AddPortal(){
         return view('backend.staff.portal.portal_add');
     } //end method
 
     public function StorePortal(Request $request){
         $request->validate([
             'portal' => 'required',
         ],[
             'portal.required' => 'Input Portal Name'
         ]);
 
         $image = $request->file('portal_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(128,128)->save('upload/portal/'.$name_gen);
         $save_url = 'http://127.0.0.1:8000/upload/portal/'.$name_gen;
 
         portal::insert([
             'portal_image' => $save_url,
             'portal' => $request->portal,
         ]);
 
         $notification = array(
             'message' => 'Portal Inserted successfully',
             'alert-type' => 'success',
         );
 
         return redirect()->route('all.portal')->with($notification);
 
 
     } //end method
 
     public function EditPortal($id){  
         $portal = portal::findOrFail($id);
         return view('backend.staff.portal.portal_edit',compact('portal'));
     } // end method
     
     public function UpdatePortal(Request $request){  
         $portal_id = $request->id;
         if($request->file('portal_image')){
             $image = $request->file('portal_image');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(128,128)->save('upload/portal/'.$name_gen);
             $save_url = 'http://127.0.0.1:8000/upload/portal/'.$name_gen;
 
         portal::findOrFail($portal_id)->update([
             'portal' => $request->portal,
             'portal_image' => $save_url,
         ]);
         
         $notification = array(
             'message' => 'Portal Updated with image successfully',
             'alert-type' => 'success',
         );
         
         return redirect()->route('all.portal')->with($notification);
     }else{
         portal::findOrFail($portal_id)->update([
             'portal' => $request->portal,
         ]);
         
         $notification = array(
             'message' => 'Portal Updated without image successfully',
             'alert-type' => 'success',
         );
         
         return redirect()->route('all.portal')->with($notification);
     }
 } // end method
 
 public function DeletePortal($id){  
     
     portal::findOrFail($id)->delete();
     
     $notification = array(
         'message' => 'Portal Deleted successfully',
         'alert-type' => 'success',
     );
     
     return redirect()->back()->with($notification);
 }

 public function GetPortal(){
    $portal = portal::all();
    return $portal;
 }

}
