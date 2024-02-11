<?php

namespace Modules\Books\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\table_semesters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SemstersController extends Controller
{
    public function index(){
        $data = table_semesters::all();
        return view("books::semesters.semester", compact('data'));
    }

    public function add(Request $req){
        $sem = $req->sem;

        $data = array();
        for($i=0; $i<count($sem); $i++){
            $data = array('sem_number' => $sem[$i]);
            table_semesters::insert($data);
        }
        echo 1;
    }

    public function editSem(Request $req){
        $id = $req->id;
        $sem = $req->sem;

        DB::table('table_semesters')->where('sem_id', $id)->update(['sem_number' => $sem]);
        echo 1;
    }

    public function destroy($id){
        DB::table('table_semesters')->where('sem_id', $id)->delete();
        return redirect()->route('sem')->with(['msg' => 'Semester deleted successfully.']);
    }
}
