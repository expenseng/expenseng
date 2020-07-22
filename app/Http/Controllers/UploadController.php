<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UsersImport;
use App\Imports\PeopleImport;
use App\Imports\BudgetImport;
use App\Imports\CabinetImport;
use App\Imports\CitizenImport;
use App\Imports\CompanyImport;
use App\Imports\ExpenseImport;
use App\Imports\MinistryImport;
use App\Imports\PaymentImport;
use App\Imports\SectorImport;
use Maatwebsite\Excel\Facades\Excel;
// use Validator;
use Importer;

class UploadController extends Controller
{
    

    public function importFile()
    {
        return view('upload');
    }

    public function importExcel(Request $request)
    {
        // return view('upload');
        $validator = \Validator::make($request->all(), [
            'file'=> 'required|max:5000|mimes:xlsx,xls,csv'
        ]);
        if ($validator->passes()) {
            $sheet_type=$request->sheetType;
            
            if ($sheet_type=='company') {
                $file = $request-> file('file');
                try {
                    Excel::import(new CompanyImport, $file);
                } catch (\Exception $exception) {
                     return redirect()->back()
                     ->with(['errors'=>array('data not save, ensure the file is well arranged,also ensure that each person has a unique name and shortname in data base ')]);
                }
                return redirect()->back()
                ->with(['success'=>'company file uploaded successfully']);
            }

            if ($sheet_type=='budget') {
                $file = $request-> file('file');
                try {
                    Excel::import(new BudgetImport, $file);
                } catch (\Exception $exception) {
                    return redirect()->back()
                    ->with(['errors'=>array('content in file not well arranged')]);
                }
             // return back()-> withStatus('saved');
                return redirect()->back()
                ->with(['success'=>'budject file uploaded successfully']);
            }
            if ($sheet_type=='payment') {
                $file = $request-> file('file');
                try {
                    Excel::import(new PaymentImport, $file);
                } catch (\Exception $exception) {
                    return redirect()->back()
                    ->with(['errors'=>array('content in file not well arranged')]);
                }
             // return back()-> withStatus('saved');
                return redirect()->back()
                ->with(['success'=>'payment file uploaded successfully']);
            }
            if ($sheet_type=='ministry') {
                $file = $request-> file('file');
                try {
                    Excel::import(new MinistryImport, $file);
                } catch (\Exception $exception) {
                    return redirect()->back()
                    ->with(['errors'=>array('data not save, ensure the file is well arranged,also ensure that each person has a unique code')]);
                }
    
             // return back()-> withStatus('saved');
                return redirect()->back()
                ->with(['success'=>'ministry file uploaded successfully']);
            }
            if ($sheet_type=='cabinet') {
                $file = $request-> file('file');
                try {
                    Excel::import(new CabinetImport, $file);
                } catch (\Exception $exception) {
                    return redirect()->back()
                    ->with(['errors'=>array('data not save, ensure the file is well arranged, also ensure that each person has a unique ministry code')]);
                }
    
                return redirect()->back()
                ->with(['success'=>'cabinet file uploaded successfully']);
            }
            if ($sheet_type=='people') {
                $file = $request-> file('file');
                try {
                    Excel::import(new PeopleImport, $file);
                } catch (\Exception $exception) {
                    return redirect()->back()
                    ->with(['errors'=>array('Data not saved, ensure the file is well arranged, also ensure that each person has a unique company id ')]);
                }
                return redirect()->back()
                ->with(['success'=>'people file uploaded successfully']);
            }
           
            if ($sheet_type=='sector') {
                $file = $request-> file('file');
                try {
                      Excel::import(new SectorImport, $file);
                } catch (\Exception $exception) {
                     return redirect()->back()
                     ->with(['errors'=>array('sector file not uploaded, please check the file format')]);
                }
             // return back()-> withStatus('saved');
                return redirect()->back()
                ->with(['success'=>'sector file uploaded successfully']);
            }
            if ($sheet_type=='expense') {
                $file = $request-> file('file');
                try {
                    Excel::import(new ExpenseImport, $file);
                } catch (\Exception $exception) {
                    return redirect()->back()
                    ->with(['errors'=>array('Data not saved, ensure the file is well arranged or does not exist in the data base ')]);
                }
                // return back()-> withStatus('saved');
                return redirect()->back()
                ->with(['success'=>'expense file uploaded successfully']);
            }

            if ($sheet_type=='citizen') {
                $file = $request-> file('file');
                try {
                    Excel::import(new CitizenImport, $file);
                } catch (\Exception $exception) {
                    return redirect()->back()
                    ->with(['errors'=>array('invalid file format , please provide the file for Citizen')]);
                }
    
                 return redirect()->back()
                 ->with(['success'=>'citizen file uploaded successfully']);
            } else {
                return redirect()->back()
                ->with(['errors'=>[0=>'ivalid excel format']]);
            }
         
        } else {
            return redirect()->back()
            ->with(['errors'=>$validator->errors()->all()]);
        // return 'File has been uploaded successfully';
        }
    }
}
