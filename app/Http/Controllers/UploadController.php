<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Importer;

class UploadController extends Controller
{
    //
    // public function uploadFile()
    // {
    //     return view('upload');
    // }

    // public function uploadSheet(Request $req)
    // {
    //     ['file'=> 'required|max:100|mimes:xlsx,xls,png,csv'];
    //     // $req->file->store('public');
    //     $dataTime = date('Ymd_His');
    //     $file = $req-> file('file');
    //     $fileName = $dataTime . '-' . $file->getClientOriginalName();
    //     $savePath = public_path('public');
    //     $file->move($savePath,$fileName);

    //     return 'File has been uploaded successfully';
    // }

    public function importFile(){
        return view('upload');
    }

    public function importExcel(Request $request){
        // return view('upload');
        $validator = \Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xlsx,xls,csv'
        ]);
        if ($validator->passes()){
            $dataTime = date('Ymd_His');
            $file = $request-> file('file');
            $fileName = $dataTime . '-' . $file->getClientOriginalName();
            $savePath = public_path('/file/');
            $file->move($savePath,$fileName);

            $excel = \Importer::make('Excel');
            $excel->load($savePath.$fileName);
            // $collection - $excel->getCollection();

    //         if(sizeof($collection[1] ==5)){
    // //     return 'File has been uploaded successfully';

    //         }else{
    //             return redirect()->back()
    //         ->with(['errors'=>[0=>'provide the data with the file according to the sampe']]);

    //         }

            return redirect()->back()
            ->with(['success'=>'file uploaded successfully']);
        }else{
            return redirect()->back()
            ->with(['errors'=>$validator->errors()->all( )]);
        // return 'File has been uploaded successfully';

        }
    }

}
