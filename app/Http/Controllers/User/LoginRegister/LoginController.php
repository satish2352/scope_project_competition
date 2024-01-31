<?php

namespace App\Http\Controllers\User\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\User\LoginRegister\LoginService;
use Session;
use Validator;
use PDO;

class LoginController extends Controller
{
    public static $loginServe,$masterApi;
    public function __construct()
    {
        self::$loginServe = new LoginService();
    }

    public function index(){
        
        return view('user.login');
    }

    // public function submitLogin(Request $request) {
    //     // dd($request);

    //     $rules = [
    //         'email' => 'required | email', 
    //         'password' => 'required',
    //         'g-recaptcha-response' => 'required|captcha',
    //         ];
    //     $messages = [   
    //         'email.required' => 'Please Enter Email.',
    //         'email.email' => 'Please Enter a Valid Email Address.',
    //         'password.required' => 'Please Enter Password.',
    //         'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
    //         'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
    //     ];
    
    //     try {
    //         $validation = Validator::make($request->all(),$rules,$messages);
    //         if($validation->fails() )
    //         {
    //             return redirect('login')
    //                 ->withInput()
    //                 ->withErrors($validation);
    //         } else {
    //             $resp  = self::$loginServe->checkLogin($request);
    //             if($resp['status']=='success') {

    //                 if ($resp->registration_type== 0) {
    //                     return redirect('/user/project-registration');
    //                 } elseif ($resp->registration_type == 1) {
    //                     return redirect('/user/add-industry-data');
    //                 }

    //                 // return Redirect(route('project-registration'));       
    //                 return redirect('/user/project-registration');
                    
    //             } else {
    //                 return redirect('login')->with('error', $resp['msg']);
    //             }

    //         }
    //     } catch (Exception $e) {
    //         // return redirect('feedback-suggestions')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
    //     }
        
    // }

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
            if($validation->fails()) {
                return redirect('login')
                    ->withInput()
                    ->withErrors($validation);
            } else {
                $resp  = self::$loginServe->checkLogin($request);
                // dd($request);
                if($resp['status'] == 'success') {
                    $userType = session('user_type');
                    // dd($userType);
    //                 $registrationType = $resp['registration_type']; // Store registration_type
    // dd($registrationType);
                    if ($userType  == 0) {
                        return redirect('/user/project-registration');
                    } elseif ($userType == 1) {
                        return redirect('/user/add-industry-data');
                    }
    
                    return redirect('/user/project-registration');
                } else {
                    return redirect('login')->with('error', $resp['msg']);
                }
            }
        } catch (Exception $e) {
            // return redirect('feedback-suggestions')->withInput()->with(['msg' => $e->getMessage(), 'status' => 'error']);
        }
    }
    

}
