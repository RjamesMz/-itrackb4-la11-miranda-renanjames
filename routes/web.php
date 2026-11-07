<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;



Route::get('/whoami', function () {
    return 'Renan James Z. Miranda| 2023-70705 | Block 4C | ITRACKB4 Laravel 12';
});

Route::get('/medicines/filter/{type?}', function($type = 'all'){
    return redirect()->route('medicines.index', ['type' => $type]);
})
 -> name('medicines.filter');


Route::resource('medicines', MedicineController::class);
