<?php

namespace App\Http\Controllers;

use App\crm\auth\login\request\loginRequest;
use App\crm\auth\login\service\loginService;
use App\crm\user\models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
class loginController extends Controller

{
    private loginService $login;

    public function __construct(loginService $login)
    {
        $this->login=$login;
    }
    public function login(loginRequest $request)
    {
        return $this->login->login($request);

    }

}
