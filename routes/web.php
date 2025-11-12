<?php

use App\Models\TradeLicence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\TradeLicenceController;





Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);


//for Create new trade liecnce
// Route::get('/trade_licence_resigter',[TradeLicenceController::class,'new_trade_licence_resigter']);
// Route::post('/trade_licence_resigter', [TradeLicenceController::class, 'store']);

// //updating trade liecnce
// Route::get('/edit_trade_licence/{id}',[TradeLicenceController::class,'edit_trade_licence']);
// Route::put('/edit_trade_licence/{id}', [TradeLicenceController::class, 'update']);
// Route::delete('/trade_licence/{id}', [TradeLicenceController::class, 'destroy']);

// //final view of trade liecnce
// Route::get('/trade_licence/{id}',[TradeLicenceController::class,'trade_licence_view']);



// Only logged-in users can access the routes defined within this group.
Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {

    //$licences = TradeLicence::all();
     $licences = TradeLicence::where('user_id', Auth::id())->get();

    return view('index',['licences' => $licences]);
    });


    // --- Creation Routes ---
    // Show the new registration form (GET)
    Route::get('/trade_licence_resigter', [TradeLicenceController::class, 'new_trade_licence_resigter']);
    // Handle form submission and creation (POST)
    Route::post('/trade_licence_resigter', [TradeLicenceController::class, 'store']);

    // --- Update/Edit Routes ---
    // Show the edit form (GET)
    Route::get('/edit_trade_licence/{id}', [TradeLicenceController::class, 'edit_trade_licence']);
    // Handle form submission and update (PUT)
    Route::put('/edit_trade_licence/{id}', [TradeLicenceController::class, 'update']);

    // --- Delete Route ---
    // Handle deletion (DELETE)
    Route::delete('/trade_licence/{id}', [TradeLicenceController::class, 'destroy']);

    // --- View Route ---
    // Show the final view of a specific licence (GET)
    Route::get('/trade_licence/{id}', [TradeLicenceController::class, 'trade_licence_view']);



    //----------------Photo to QR code routes----------------//

    // Edit a specific photo (show individual replace form)
    Route::get('/photo/{photo}/edit', [PhotoController::class, 'edit'])->name('photo.edit');
    // Update a specific photo (replace file)
    Route::put('/photo/{photo}', [PhotoController::class, 'update'])->name('photo.update');

    // Show the main gallery page (Add/View/Delete options)
    Route::get('/gallery', [PhotoController::class, 'index'])->name('gallery.index');
    // Handle adding NEW images (multi-upload support)
    Route::post('/gallery', [PhotoController::class, 'new_store'])->name('gallery.new_store');
    // Handle deleting a single image
    Route::delete('/gallery/{photo}', [PhotoController::class, 'destroy'])->name('gallery.destroy');


});

// Route to show the upload form (if no photo exists) or edit form (if photo exists)
//Route::get('/photo/upload', [PhotoController::class, 'create'])->name('photo.create');

// Route to handle the photo upload/replacement logic
//Route::post('/photo', [PhotoController::class, 'store'])->name('photo.store');


