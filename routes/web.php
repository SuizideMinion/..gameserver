<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
//Route::group('{id}', ['middleware' => ['Loginkey']], function () {
//Route::prefix('{loginkey}')->middleware(['loginkey'])->group( function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('login/{id}', function($id) {
        $user = \App\Models\User::where('token', $id)->first();
//        dd($user);
        if ($user) {
            Auth::loginUsingId($user->id);
            auth()->user()->ress1();
            auth()->user()->ress2();
            auth()->user()->ress3();
            auth()->user()->ress4();
            auth()->user()->ress5();
        }
        return redirect('/');
    });
    Route::get('logout', function () {
        Session::flush();
        Auth::logout();

        return Redirect('/');
    });
//});
Route::resource('tiles', 'App\Http\Controllers\TileMapEditorController');
Route::post('tiles/ajax/send/{id}', 'App\Http\Controllers\TileMapEditorController@ajax');
