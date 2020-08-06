<?php

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

use App\User;
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $opcaoCliente = Input::get ( 'cliente' );
    $opcaoVendedor = Input::get ( 'vendedor' );
    $data1 = Input::get ( 'data1' );
    $data2 = Input::get ( 'data2' );


    $user = User::where($opcaoCliente,'LIKE','%'.$q.'%')->orWhere($opcaoVendedor,'LIKE','%'.$q.'%')->orderBy('data','desc')->get();

    $user1 = User::whereBetween('data',[$data1,$data2])->orderBy('data','desc')->get();

    if(count($user) > 0 && $q!=null){
        return view('home')->withDetails($user)->withQuery ( $q );
    }
    else

    if(count($user) > 0 && $data1!=null && $data2!=null){
        return view('home')->withDetails($user1)->withQuery ( '' );
    }
    else return view ('home')->withMessage('Nenhum resultado');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
