<?php

namespace App\Http\Controllers\User\LoginRegister;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\User\LoginRegister\RegisterServices;
use App\Models\ {
    Users
};
use Validator;
use session;
use Config;

class RegisterController extends Controller {
    /**
     * Topic constructor.
     */
    public function __construct()
    {
        $this->service = new RegisterServices();
    }

    public function index()
    {
        $register_user = $this->service->index();
        return view('admin.pages.users.users-list',compact('register_user'));
    }

  

    public function addUsers(){
      
    	return view('admin.pages.users.add-users');
    }

    public function register(Request $request){

        $rules = [
                    'u_email' => 'required|unique:users,u_email|regex:/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z])+\.)+([a-zA-Z0-9]{2,4})+$/',
                    'u_password'=>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[a-zA-Z\d]).{8,}$/',
                    'password_confirmation' => 'required|same:u_password',
                    'mobile_no' =>  'required|regex:/^[0-9]{10}$/',
                    'registration_type' => 'required',
                    // 'education_type' => 'required',
                    'g-recaptcha-response' => 'required|captcha',
                    
                 ];       

        $messages = [   
                        'u_email.required' => 'Please enter email.',
                        'u_email.unique' => 'Your email is already exist.',
                        'u_email.regex' => 'Enter valid email.',
                        'u_password.required' => 'Please enter password.',
                        'u_password.regex' => 'Password should be more than 8 numbers with atleast 1 capital letter,1 small letter, 1 number and 1 special character.',
                        'password_confirmation.same' => 'The password confirmation does not match.',
                        'mobile_no.required' => 'Please enter number.',
                        'mobile_no.regex' => 'Please enter only numbers with 10-digit.',
                        'registration_type' => 'Please select type',
                        // 'education_type' => 'Please select type of course',
                        'g-recaptcha-response.captcha' => 'Captcha error! try again later or contact site admin.',
                        'g-recaptcha-response.required' =>'Please verify that you are not a robot.',
                       
                      ];


        $validation = Validator::make($request->all(),$rules,$messages);
        if($validation->fails() )
        {
            return redirect('registration')
            ->withInput()
            ->withErrors($validation);
        }
        else
        {
            $register_user = $this->service->register($request);
          
            if($register_user)
            {
              
                $msg = $register_user['msg'];
                $status = $register_user['status'];
                if($status=='success') {
                    return redirect('registration')->with(compact('msg','status'));
                }
                else {
                    return redirect('registration')->withInput()->with(compact('msg','status'));
                }
            }
            
        }


    }


}