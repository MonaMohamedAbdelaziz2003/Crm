<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;


class carController extends Controller{


    public function index(Request $request)  {
        return Car::all();
    }
}
?>
