<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    public function uploadFile()
    {
        return view('upload');
    }

    public function uploadSheet(Request $req)
    {
        ['file'=> 'required|max:100|mimes:xlsx,xls,csv'];
        // $req->file->store('public');
        $dataTime = date('Ymd_His');
        $file = $req-> file('file');
        $fileName = $dataTime . '-' . $file->getClientOriginalName();
        $savePath = public_path('public');
        $file->move($savePath,$fileName);

        return 'File has been uploaded successfully';
    }

}
