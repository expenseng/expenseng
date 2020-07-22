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
    

    public function importFile(){
        return view('upload');
    }

    public function importExcel(Request $request){
        // return view('upload');
        $validator = \Validator::make($request->all(),[
            'file'=> 'required|max:5000|mimes:xlsx'
        ]);
        if ($validator->passes()){
           $sheet_type=$request->sheetType;
            // start conpany
           if($sheet_type=='company'){
            $file = $request-> file('file');
            try{
            Excel::import(new CompanyImport,$file);
            }catch (\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];          
                            if($errorCode == 1062){
            return redirect()->back()
            ->with(['errors'=>[0=>'this data already exist in the database']]);
                            } else {
                                return redirect()->back()
                                ->with(['errors'=>[0=>'wrong file arrangement']]); 
                            }
            }
            catch(\Exception $exception){
                
                return redirect()->back()
                ->with(['errors'=>array('content in file not well arranged')]);
            }
            return redirect()->back()
            ->with(['success'=>'company file uploaded successfully']);
           }
            // end conpany

           if($sheet_type=='budget'){
            $file = $request-> file('file');
            try{
            Excel::import(new BudgetImport,$file);
                }
                catch (\Illuminate\Database\QueryException $e){
                    $errorCode = $e->errorInfo[1];          
                                if($errorCode == 1062){
                return redirect()->back()
                ->with(['errors'=>[0=>'this data already exist in the database']]);
                                } else {
                                    return redirect()->back()
                                    ->with(['errors'=>[0=>'wrong file arrangement']]); 
                                }
                }
                catch(\Exception $exception){
                    
                    return redirect()->back()
                    ->with(['errors'=>array('content in file not well arranged')]);
                }
            // return back()-> withStatus('saved');
            return redirect()->back()
            ->with(['success'=>'budject file uploaded successfully']);
           }
           if($sheet_type=='payment'){
            $file = $request-> file('file');
            try{
            Excel::import(new PaymentImport,$file);
                }
                catch (\Illuminate\Database\QueryException $e){
                    $errorCode = $e->errorInfo[1];          
                                if($errorCode == 1062){
                return redirect()->back()
                ->with(['errors'=>[0=>'this data already exist in the database']]);
                                } else {
                                    return redirect()->back()
                                    ->with(['errors'=>[0=>'wrong file arrangement']]); 
                                }
                }
                catch(\Exception $exception){
                    
                    return redirect()->back()
                    ->with(['errors'=>array('content in file not well arranged')]);
                }
            // return back()-> withStatus('saved');
            return redirect()->back()
            ->with(['success'=>'payment file uploaded successfully']);
           }
           if($sheet_type=='ministry'){
            $file = $request-> file('file');
            try{
            Excel::import(new MinistryImport,$file);
                    }
                    catch (\Illuminate\Database\QueryException $e){
                        $errorCode = $e->errorInfo[1];          
                                    if($errorCode == 1062){
                    return redirect()->back()
                    ->with(['errors'=>[0=>'this data already exist in the database']]);
                                    } else {
                                        return redirect()->back()
                                        ->with(['errors'=>[0=>'wrong file arrangement']]); 
                                    }
                    }
                    catch(\Exception $exception){
                        
                        return redirect()->back()
                        ->with(['errors'=>array('wrong file format')]);
                    }
    
            // return back()-> withStatus('saved');
            return redirect()->back()
            ->with(['success'=>'ministry file uploaded successfully']);
           }
           if($sheet_type=='cabinet'){
            $file = $request-> file('file');
            try{
            Excel::import(new CabinetImport,$file);
                        }
                        catch (\Illuminate\Database\QueryException $e){
                            $errorCode = $e->errorInfo[1];          
                                        if($errorCode == 1062){
                        return redirect()->back()
                        ->with(['errors'=>[0=>'this data already exist in the database']]);
                                        } else {
                                            return redirect()->back()
                                            ->with(['errors'=>[0=>'wrong file arrangement']]); 
                                        }
                        }
                        catch(\Exception $exception){
                            
                            return redirect()->back()
                            ->with(['errors'=>array('content in file not well arranged')]);
                        }
    
            return redirect()->back()
            ->with(['success'=>'cabinet file uploaded successfully']);
           }
           if($sheet_type=='people'){
            $file = $request-> file('file');
            try{
            Excel::import(new PeopleImport,$file);
                            }
                            catch (\Illuminate\Database\QueryException $e){
                                $errorCode = $e->errorInfo[1];          
                                            if($errorCode == 1062){
                            return redirect()->back()
                            ->with(['errors'=>[0=>'this data already exist in the database']]);
                                            } else {
                                                return redirect()->back()
                                                ->with(['errors'=>[0=>'wrong file arrangement']]); 
                                            }
                            }
                            catch(\Exception $exception){
                                
                                return redirect()->back()
                                ->with(['errors'=>array('content in file not well arranged')]);
                            }
                return redirect()->back()
            ->with(['success'=>'people file uploaded successfully']);
           }
           
           if($sheet_type=='sector'){
            $file = $request-> file('file');
            try{
                Excel::import(new SectorImport,$file);
            }
            catch (\Illuminate\Database\QueryException $e){
                $errorCode = $e->errorInfo[1];          
                            if($errorCode == 1062){
            return redirect()->back()
            ->with(['errors'=>[0=>'this data already exist in the database']]);
                            } else {
                                return redirect()->back()
                                ->with(['errors'=>[0=>'wrong file arrangement']]); 
                            }
            }
            catch(\Exception $exception){
                
                return redirect()->back()
                ->with(['errors'=>array('wrong file formatcontent in file not well arranged')]);
            }
            // return back()-> withStatus('saved');
            return redirect()->back()
            ->with(['success'=>'sector file uploaded successfully']);
           }
           if($sheet_type=='expense'){
            $file = $request-> file('file');
            try{
            Excel::import(new ExpenseImport,$file);
                                    }
                                    catch (\Illuminate\Database\QueryException $e){
                                        $errorCode = $e->errorInfo[1];          
                                                    if($errorCode == 1062){
                                    return redirect()->back()
                                    ->with(['errors'=>[0=>'this data already exist in the database']]);
                                                    } else {
                                                        return redirect()->back()
                                                        ->with(['errors'=>[0=>'wrong file arrangement']]); 
                                                    }
                                    }
                                    catch(\Exception $exception){
                                        
                                        return redirect()->back()
                                        ->with(['errors'=>array('wrong file format')]);
                                    }
                // return back()-> withStatus('saved');
            return redirect()->back()
            ->with(['success'=>'expense file uploaded successfully']);
           }

             if($sheet_type=='citizen'){
            $file = $request-> file('file');
            try{
            Excel::import(new CitizenImport,$file);
                                }
                                catch (\Illuminate\Database\QueryException $e){
                                    $errorCode = $e->errorInfo[1];          
                                                if($errorCode == 1062){
                                return redirect()->back()
                                ->with(['errors'=>[0=>'this data already exist in the database']]);
                                                } else {
                                                    return redirect()->back()
                                                    ->with(['errors'=>[0=>'wrong file arrangement']]); 
                                                }
                                }
                                catch(\Exception $exception){
                                    
                                    return redirect()->back()
                                    ->with(['errors'=>array('content in file not well arranged')]);
                                }
    
            return redirect()->back()
            ->with(['success'=>'citizen file uploaded successfully']);
           }
           
           
           
           
           else{
        return redirect()->back()
                ->with(['errors'=>[0=>'ivalid excel format']]);
    

           }

        }else{
            return redirect()->back()
            ->with(['errors'=>$validator->errors()->all( )]);
        // return 'File has been uploaded successfully';

        }
    }

}
