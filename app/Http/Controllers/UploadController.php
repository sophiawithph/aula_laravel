<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){
        return view('upload.index');
    }
    public function save(Request $form){
        $arquivo = $form->file('up_file');

        $arquivo->store('public');

        return 'Gravado';
    }
}
