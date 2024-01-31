<?php

namespace App\Http\Repository\User\LoginRegister;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ {
    Users
};


class LoginRepository
{
	function __construct() {
		
    }

    public function checkLogin($request) {
        $data = [];
        $data['user_details'] = Users::where( [
                                       'u_email' => $request['email'],
                                       'is_active' => 1
                                        ])
                                        ->select('*')
                                        ->first();
        return $data;
    }
}