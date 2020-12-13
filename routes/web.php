<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use App\Models\Phone;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('phones');
});

Route::any('/search',function(Request $request){
    $q = $request->input('q');
    $phones = Phone::where('color','LIKE','%'.$q.'%')->orWhere('memory','LIKE','%'.$q.'%')->get();
    if(count($phones) > 0)
        return view('search')->with(['phones' => $phones, 'q' => $q])->withDetails($phones)->withQuery ($q);
    else return view ('search_notfound')->withQuery($q)->withMessage('No Details found. Try to search again !');
});

Route::get('/', function () {
    $phones = Phone::orderBy('created_at', 'asc')->get();

    return view('phones', [
        'phones' => $phones
    ]);
});

Route::post('/phone', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'brand' => 'required|max:255',
        'model' => 'required|max:255',
        'price' => 'required|max:255',
        'color' => 'required|max:255',
        'memory' => 'required|max:10',
        'created_year' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $phone = new Phone;
    $phone->brand = $request->brand;
    $phone->model = $request->model;
    $phone->price = $request->price;
    $phone->created_year = $request->created_year;
    $phone->color = $request->color;
    $phone->memory = $request->memory;
    $phone->save();

    return redirect('/');
});


Route::delete('/phone/{id}', function ($id) {
    Phone::findOrFail($id)->delete();

    return redirect('/');
});

