<?php

namespace Modules\Books\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\table_years;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
    public function index()
    {
        $data = table_years::all();
        return view('books::Years.years', compact('data'));
    }

    public function add(Request $req){
        $years = $req->years;

        $data = array();
        for($i = 0; $i<count($years); $i++){
            $data = array('year_number' => $years[$i]);
            table_years::insert($data);
        }
        echo 1;
    }

    public function editYear(Request $req){
        $id = $req->id;
        $year = $req->year;

        DB::table('table_years')->where('year_id', $id)->update(['year_number' => $year]);
        echo 1;
    }

    public function destroy($id){
        DB::table('table_years')->where('year_id', $id)->delete();
        return redirect()->route('years')->with(['msg' => "Year deleted successfully."]);
    }
}
