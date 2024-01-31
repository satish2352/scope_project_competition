<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ {
    InstituteLists
};

class CommonController extends Controller {
    public function __construct()
    {
    }
    
    public function getCollegeList(Request $request) {
        $education_type = $request['education_type'];
        $institute_list = InstituteLists::where('is_active', 1) 
                ->where('education_type', $education_type)
                ->get();
        return response()->json(['institute_list' => $institute_list]);
    }


    
    public function logoutUser(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login');
    }


    
    public function logoutAdmin(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/admin');
    }

   
  
}