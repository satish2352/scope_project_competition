<?php
namespace App\Http\Repository\User\LoginRegister;

use Illuminate\Database\QueryException;
use DB;
use Illuminate\Support\Carbon;
use Session;
use App\Models\{
	Users
};
use Illuminate\Support\Facades\Mail;

class RegisterRepository
{

	
	public function register($request)
	{
		$ipAddress = '';//getIPAddress($request);
		$user_data = new Users();
		$user_data->u_email = $request['u_email'];
		$user_data->u_password = bcrypt($request['u_password']);
		$user_data->mobile_no = $request['mobile_no'];
		$user_data->registration_type = $request['registration_type'];
		// $user_data->ip_address = $ipAddress;
		$user_data->save();
		$last_insert_id = $user_data->id;
        return $last_insert_id;

	}
	
}