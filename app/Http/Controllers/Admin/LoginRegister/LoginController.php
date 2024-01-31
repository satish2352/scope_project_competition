<?php

namespace App\Http\Controllers\Admin\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\Admin\LoginRegister\LoginService;
use Session;
use Validator;
use PDO;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
    }

    public function index(){
        
        return view('admin.login');
    }

    public function submitLogin(Request $request) {
        // dd($request);

        $rules = [
            'email' => 'required | email', 
            'password' => 'required',
            'g-recaptcha-response' => 'required|captcha',
            ];
        $messages = [   
            'email.required' => 'Please Enter Email.',
            'email.email' => 'Please Enter a Valid Email Address.',
            'password.required' => 'Please Enter Password.',
            'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
            'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
        ];
    
        try {
            $validation = Validator::make($request->all(),$rules,$messages);
            if($validation->fails() )
            {
                return redirect('admin')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $response = [];
                $response['user_details'] = Admins::where( [
                                               'u_email' => $request['email'],
                                               'is_active' => 1
                                                ])
                                                ->select('*')
                                                ->first();
                
                                                if ($response['user_details']) {
                                                    $password = $request['password'];
                                                    if (Hash::check($password, $response['user_details']['u_password'])) {
                                                        $request->session()->put('admin_id', $response['user_details']['id']);
                                                        $request->session()->put('u_email', $response['user_details']['u_email']);
                                                        $request->session()->put('user_type', $response['user_details']['registration_type']);
                                        
                                                        // Check registration_type and redirect accordingly
                                                        if ($response['user_details']['registration_type'] == 0) {
                                                            return redirect('/admin/register-users');  // Change this to the appropriate admin dashboard route
                                                        } elseif ($response['user_details']['registration_type'] == 1) {
                                                            return redirect('/admin/industry-list');  // Change this to the appropriate user dashboard route
                                                        } else {
                                                            return redirect('/admin/login')->with('error', 'Unknown registration type.');
                                                        }
                                                    } else {
                                                        $resp = ['status' => 'failed', 'msg' => 'These credentials do not match our records.'];
                                                    }
                                                } else {
                    $resp = ['status'=>'failed','msg'=>'These credentials do not match our records.'];
                }


                if($resp['status']=='success') {
                    return redirect('/admin/register-users');
                } else {
                    return redirect('/admin/login')->with('error', $resp['msg']);
                }

            }
        } catch (Exception $e) {
            // return redirect('feedback-suggestions')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
        
    }

}
