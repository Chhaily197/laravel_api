<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{
    public function index(Request $req){
        $customFontSize = $req->input('fontSize', 'medium');
        $fontTheme = $req->input('fontTheme', 'default');
        return view('home', compact('customFontSize', 'fontTheme'));
    }

    public function changeLanguage(Request $req){
        App::setLocale($req->lang);

        session()->put('locale', $req->lang);
        return redirect()->back();
    }
}
