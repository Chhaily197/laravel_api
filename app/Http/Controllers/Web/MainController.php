<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\table_years;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $data = table_years::all();
        return view("books::Years.years", compact('data'));
    }
}
