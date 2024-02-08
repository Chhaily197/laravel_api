<?php

namespace Modules\Books\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\table_years;

class YearController extends Controller
{
    public function index()
    {
        $data = table_years::all();
        return view('books::Years.years', compact('data'));
    }

    public function add(Request $req){
        $this->validate($req, [
            'year' => 'required|integer|max:10'
        ]);

        $year = $req->input('year');

        table_years::create([
            'year_number' => $year,
        ]);

        return redirect()->route('years');
    }
}
