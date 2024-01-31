<?php

namespace App\Http\Controllers\User\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DashboardController extends Controller {
    /**
     * Topic constructor.
     */
    public function __construct()
    {
    }

    public function index()
    {
        $msg = '';
        $status = '';
        return view('user.pages.dashboard',compact('msg', 'status'));
    }



}