<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\StaffController;
use App\Http\Controllers\admin\SuperAdminController;
use App\Http\Controllers\AdminStaff\DataController;
use App\Http\Controllers\Adminstaff\PartyController;
use App\Http\Controllers\AdminStaff\PortalController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('auth.login');
    })->name('dashboardnew');
});

// login routes

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/logout',[AuthController::class, 'AdminLogout'])->name('admin.logout');

Route::post('/login', [AuthController::class, 'Login'])->name('login');

// register routes
Route::post('/register', [AuthController::class, 'Register']);



Route::group(['prefix' => 'super-admin','middleware'=>['web','isSuperAdmin']],function(){
    Route::get('/dashboard',[SuperAdminController::class,'Dashboard'])->name('super-admin.dash');
    Route::get('/profile',[SuperAdminController::class,'UserProfile'])->name('super_admin.profile');
});

Route::group(['prefix' => 'admin','middleware'=>['web','isAdmin']],function(){
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dash');
    Route::get('/profile',[AdminController::class,'UserProfile'])->name('admin.profile');
    // User profile store route
    Route::post('/user/profile/store',[AdminController::class, 'UserProfileStore'])->name('user.profile.store');
    
    // User profile password route
    Route::get('/change/password',[AdminController::class, 'ChangePassword'])->name('change.password');
    
    Route::post('/change/password/update',[AdminController::class, 'ChangePasswordUpdate'])->name('change.password.update');
});

Route::group(['prefix' => 'staff','middleware'=>['web','isStaff']],function(){

    Route::get('/profile',[StaffController::class,'UserProfile'])->name('staff.profile');
    Route::get('/dashboard',[StaffController::class,'Dashboard'])->name('staff.dash');

    // Portal Routes
    Route::prefix('portal')->group(function (){

    Route::get('/all',[PortalController::class, 'GetAllPortal'])->name('all.portal');
    
    Route::get('/add',[PortalController::class, 'AddPortal'])->name('add.portal');
    
    Route::post('/store',[PortalController::class, 'StorePortal'])->name('portal.store');
    
    Route::get('/edit/{id}',[PortalController::class, 'EditPortal'])->name('portal.edit');
    
    Route::post('/update',[PortalController::class, 'UpdatePortal'])->name('portal.update');

    Route::get('/delete/{id}',[PortalController::class, 'DeletePortal'])->name('portal.delete');

    });

    // Party Routes
    Route::prefix('party')->group(function (){

    Route::get('/all',[PartyController::class, 'GetAllParty'])->name('all.party');
    
    Route::get('/add',[PartyController::class, 'AddParty'])->name('add.party');
    
    Route::post('/store',[PartyController::class, 'StoreParty'])->name('party.store');
    
    Route::get('/edit/{id}',[PartyController::class, 'EditParty'])->name('party.edit');
    
    Route::post('/update',[PartyController::class, 'UpdateParty'])->name('party.update');

    Route::get('/delete/{id}',[PartyController::class, 'DeleteParty'])->name('party.delete');
    
    });

    // subparty routes
    Route::prefix('sub-party')->group(function (){
    
        Route::get('/all',[PartyController::class, 'GetAllSubParty'])->name('all.subparty');
        
        Route::get('/add',[PartyController::class, 'AddSubParty'])->name('add.subparty');
        
        Route::post('/store',[PartyController::class, 'StoreSubParty'])->name('subparty.store');
        
        Route::get('/edit/{id}',[PartyController::class, 'EditSubParty'])->name('subparty.edit');
        
        Route::post('/update',[PartyController::class, 'UpdateSubParty'])->name('subparty.update');
    
        Route::get('/delete/{id}',[PartyController::class, 'DeleteSubParty'])->name('subparty.delete');
        
    });

    // Orders routes
    Route::prefix('order')->group(function (){
    
        Route::get('/all',[DataController::class, 'GetAllOrder'])->name('order.scan');
        
        Route::get('/view',[DataController::class, 'GetAllScan'])->name('view.scan');
        
        Route::post('/store',[DataController::class, 'StoreOrder'])->name('order.store');
        
        Route::get('/edit/{id}',[DataController::class, 'EditSubParty'])->name('subparty.edit');
        
        Route::post('/update',[DataController::class, 'UpdateSubParty'])->name('subparty.update');
    
        Route::get('/delete',[DataController::class, 'DeleteAllScan'])->name('order.delete');
        
    });

    // Return routes
    Route::prefix('return')->group(function (){
    
        Route::get('/all',[DataController::class, 'GetAllReturn'])->name('return.scan');

        Route::get('/view',[DataController::class, 'GetAllReturnScan'])->name('view.return.scan');
        
        Route::post('/store',[DataController::class, 'StoreReturn'])->name('return.store');
        
        Route::get('/edit/{id}',[DataController::class, 'EditSubParty'])->name('subparty.edit');
        
        Route::post('/update',[DataController::class, 'UpdateSubParty'])->name('subparty.update');
    
        Route::get('/delete',[DataController::class, 'DeleteAllReturnScan'])->name('return.delete');
        
    });

});