<?php

use App\Models\Datatable;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\WelcomeController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function() {
    return view('create');
});

Route::post('/create', function(Request $request){
    $validator = Validator::make(request()->all(),[
        'nameitem' => 'required', 
        'price' => 'required',
        'details' => 'required',
        'publish' => 'required'
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator);
    };

   Datatable::create([
    'nameitem' => $request->input('nameitem'),
    'price' => $request->input('price'),
    'details' => $request->input('details'),
    'publish' => $request->input('publish')
   ]);
   return redirect('/create')->withInput(($request->all()));
});

Route::get('/', [WelcomeController::class, 'index']); // Using array syntax for controller method

Route::get('/create', function () {
    return view('create');
});

Route::post('/create', function (Request $request) {
    // Your post route logic
});

Route::get('/{id}/show', [WelcomeController::class, 'show'])->name('show');

Route::get('/{id}/edit', [WelcomeController::class, 'edit'])->name('edit');
Route::put('/{id}/update', [WelcomeController::class, 'update'])->name('update');

Route::delete('/{id}/delete', [WelcomeController::class, 'destroy'])->name('delete');

Route::get('/search', [WelcomeController::class, 'search'])->name('search');

Route::post('/create', [WelcomeController::class, 'store']);

