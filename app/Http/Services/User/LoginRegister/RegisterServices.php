<?php
namespace App\Http\Services\User\LoginRegister;

use App\Http\Repository\User\LoginRegister\RegisterRepository;


use App\Models\
{ User };
use Carbon\Carbon;
use Config;
use Storage;

class RegisterServices
{

	protected $repo;

    /**
     * TopicService constructor.
     */
    public function __construct() {
        $this->repo = new RegisterRepository();
    }


    public function register($request){
        try {
            $last_id = $this->repo->register($request);
            if ($last_id) {
                return ['status' => 'success', 'msg' => 'User Registration Successfully Done. Please Login to Submit the Project.'];
            } else {
                return ['status' => 'error', 'msg' => 'User not registered please try again after some time.'];
            }  

        } catch (Exception $e) {
            return ['status' => 'error', 'msg' => $e->getMessage()];
            }      
    }

   
}