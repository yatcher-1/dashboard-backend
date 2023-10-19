<?php

namespace App\Http\Controllers\Adminstaff;

use App\Http\Controllers\Controller;
use App\Models\party;
use App\Models\SubParty;
use Illuminate\Http\Request;
use Image;

class PartyController extends Controller
{
    public function GetAllParty(){
         $party = party::latest()->get();
         return view('backend.staff.firm.party_view', compact('party'));
     } //end method

     public function AddParty(){
         return view('backend.staff.firm.party_add');
     } //end method
 
     public function StoreParty(Request $request){
         $request->validate([
             'party_name' => 'required',
         ],[
             'party_name.required' => 'Input Party Name'
         ]);
 
         $image = $request->file('party_image');
         $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
         Image::make($image)->resize(128,128)->save('upload/party/'.$name_gen);
         $save_url = 'http://127.0.0.1:8000/upload/party/'.$name_gen;
 
         party::insert([
             'party_name' => $request->party_name,
             'party_image' => $save_url,
         ]);
 
         $notification = array(
             'message' => 'Party Inserted successfully',
             'alert-type' => 'success',
         );
 
         return redirect()->route('all.party')->with($notification);
 
 
     } //end method
 
     public function EditParty($id){  
         $party = party::findOrFail($id);
         return view('backend.staff.firm.party_edit',compact('party'));
     } // end method
     
     public function UpdateParty(Request $request){  
         $party_id = $request->id;
         if($request->file('party_image')){
             $image = $request->file('party_image');
             $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
             Image::make($image)->resize(128,128)->save('upload/party/'.$name_gen);
             $save_url = 'http://127.0.0.1:8000/upload/party/'.$name_gen;
 
         party::findOrFail($party_id)->update([
             'party_name' => $request->party_name,
             'party_image' => $save_url,
         ]);
         
         $notification = array(
             'message' => 'Party Updated with image successfully',
             'alert-type' => 'success',
         );
         
         return redirect()->route('all.party')->with($notification);
     }else{
         party::findOrFail($party_id)->update([
             'party_name' => $request->party_name,
         ]);
         
         $notification = array(
             'message' => 'Party Updated without image successfully',
             'alert-type' => 'success',
         );
         
         return redirect()->route('all.party')->with($notification);
     }
 } // end method
 
 public function DeleteParty($id){  
     
     party::findOrFail($id)->delete();
     
     $notification = array(
         'message' => 'Party Deleted successfully',
         'alert-type' => 'success',
     );
     
     return redirect()->back()->with($notification);
 } // end method
 
 
 
 /////////////////////////// start sub category
 
     public function GetAllSubparty(){
         $subparty = SubParty::latest()->get();
         return view('backend.staff.firm_sub.sub_party_view', compact('subparty'));
     }
 
     public function AddSubParty(){
         $party = party::latest()->get();
         return view('backend.staff.firm_sub.sub_party_add',compact('party'));
     } //end method
 
     public function StoreSubParty(Request $request){
         $request->validate([
             'subparty_name' => 'required',
         ],[
             'subparty_name.required' => 'Input Sub-Firm Name'
         ]);
 
         SubParty::insert([
             'party_name' => $request->party_name,
             'subparty_name' => $request->subparty_name,
         ]);
 
         $notification = array(
             'message' => 'Sub-Firm Inserted successfully',
             'alert-type' => 'success',
         );
 
         return redirect()->route('all.subparty')->with($notification);
 
 
     } //end method
 
     
     public function EditSubParty($id){  
         $party = party::orderBy('party_name', 'ASC')->get();
         $subparty = SubParty::findOrFail($id);
         return view('backend.staff.firm_sub.sub_party_edit',compact('party','subparty'));
     } // end method
 
     public function UpdateSubParty(Request $request){  
         $subparty_id = $request->id;
         
         SubParty::findOrFail($subparty_id)->update([
             'party_name' => $request->party_name,
             'subparty_name' => $request->subparty_name,
         ]);
         
         $notification = array(
             'message' => 'Sub-Firm Updated successfully',
             'alert-type' => 'success',
         );
         
         return redirect()->route('all.subparty')->with($notification);
     
         } // end method
 
         public function DeleteSubParty($id){  
     
             SubParty::findOrFail($id)->delete();
             
             $notification = array(
                 'message' => 'Sub-Firm Deleted successfully',
                 'alert-type' => 'success',
             );
             
             return redirect()->back()->with($notification);
         } // end method
 
 ////////////////////////////////// end sub category

         public function GetFirm(){
                $firm = party::all();
                return $firm;
            }
}


