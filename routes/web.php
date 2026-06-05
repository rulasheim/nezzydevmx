<?php

use Illuminate\Support\Facades\Route;



Route::get('/',            fn() => view('nezzydev.home'))->name('home');
Route::get('/servicios',   fn() => view('nezzydev.servicios'))->name('servicios');
Route::get('/portafolio',  fn() => view('nezzydev.portafolio'))->name('portafolio');
Route::get('/nosotros',    fn() => view('nezzydev.nosotros'))->name('nosotros');
Route::get('/precios',     fn() => view('nezzydev.precios'))->name('precios');
Route::get('/contacto',    fn() => view('nezzydev.contacto'))->name('contacto');
Route::post('/contacto',   [App\Http\Controllers\ContactoController::class, 'store'])->name('contacto.store');

Route::get('/descubre', fn() => view('nezzydev.wizard'))->name('wizard');

Route::get('/test-anim', function () {
    return view('test-animation');
});