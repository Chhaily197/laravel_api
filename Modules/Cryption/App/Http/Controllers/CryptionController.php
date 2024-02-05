<?php

namespace Modules\Cryption\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class CryptionController extends Controller
{
    public function index()
    {
        return view('cryption::index');
    }

    public function showForm(){
        return view("cryption::encryption");
    }

    public function encrypt(Request $req){
        $data = $req->input('data');
        $encryptionFunction = App::make('encryption');
        $encryptedResult = $encryptionFunction($data);

        return view("cryption::encryption", ['encryptedResult' => $encryptedResult]);
    }

    public function decrypt(Request $req){
        $data_dec = $req->input("encrypted_data");
        $decryptionFunction = App::make("decryption");
        $decryptedResult = $decryptionFunction($data_dec);

        return view("cryption::encryption", ['decryptedResult' => $decryptedResult]);
    }
}
