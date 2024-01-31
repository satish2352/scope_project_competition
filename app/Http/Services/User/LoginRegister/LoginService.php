<?php
namespace App\Http\Services\User\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Repository\User\LoginRegister\LoginRepository;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginService 
{
	protected $repo;
	public function __construct()
    {        
        $this->repo = new LoginRepository();
    }

    public function checkLogin($request) {
        $response = $this->repo->checkLogin($request);
     
        if($response['user_details']) {
            $password = $request['password'];
            if (Hash::check($password, $response['user_details']['u_password'])) {
                $request->session()->put('user_id',$response['user_details']['id']);
                $request->session()->put('u_email',$response['user_details']['u_email']);
                $request->session()->put('user_type',$response['user_details']['registration_type']);
                $json = ['status'=>'success','msg'=>'Login successfull.'];
            } else {
                $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
            }
            
        } else {
            $json = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
        }
        return $json;
    }
}