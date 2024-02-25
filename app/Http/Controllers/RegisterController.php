<?php

namespace App\Http\Controllers;

use App\crm\auth\register\request\registerRequist;
use App\crm\auth\register\service\registerService;
use App\crm\user\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

        private registerService $register;
        public function __construct(registerService $register)
        {
            $this->register=$register;
        }
        public function register(registerRequist $requist){
           return $this->register->register($requist);
        }
}
