<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

use App\Models\ {
    ErrorLogs
};

class ErrorLogsController extends Controller
{
    public function __construct()
    {
       
    }

    public function index()
    {
        try {

            $data_output = ErrorLogs::where('is_active', true)->orderBy('is_resolved', 'ASC')->get();
            return view('website.pages.error-log.index',compact('data_output'));

        } catch (\Exception $e) {
            return $e;
        }
        
    }   

    
    public function show(Request $request)
    {
        try {
            $show_id  = $request->show_id;
            $data_output = ErrorLogs::where(['is_active'=> true,'id'=>$show_id])->first();
            return view('website.pages.error-log.show',compact('data_output'));
        } catch (\Exception $e) {
            return $e;
        }
    }   

    public function resolve(Request $request)
    {
        try {
            $show_id  = $request->show_id;
            ErrorLogs::where(['id'=>$show_id])->update(['is_resolved'=>true]);
            $data_output = ErrorLogs::where('is_active', true)->orderBy('is_resolved', 'ASC')->get();
            return view('website.pages.error-log.index',compact('data_output'));

        } catch (\Exception $e) {
            return $e;
        }
    }   
}
