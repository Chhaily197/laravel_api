<?php

namespace Modules\Books\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\table_faculties;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacultyController extends Controller
{
    public function index()
    {
        $data = table_faculties::all();
        return view('books::faculties.faculties', compact('data'));
    }

    public function add(Request $req)
    {
        $faculty = $req->faculty;
        $data = array();
        for($i=0; $i<count($faculty); $i++){
            $data = array('faculty_name' => $faculty[$i]);
            table_faculties::insert($data);
        }
        echo 1;
    }

    public function editFaculty(Request $req)
    {
        $id = $req->id;
        $faculty = $req->faculty;

        DB::table('table_faculties')->where('faculty_id', $id)->update(['faculty_name' => $faculty]);
        echo 1;
    }

    public function destroy($id)
    {
        DB::table('table_faculties')->where('faculty_id', $id)->delete();
        return redirect()->route('faculty')->with(['msg' => 'Faculty deleled successfully.']);
    }
}
