<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Route;
class ErrorHandlingController extends Controller
{

    public function errorHandling(Request $request) {
        // dd(Route::current()->getName());
        // dd($request);
        return view('error');
    }
}