<?php

namespace App\Http\Controllers;

use App\CompanyType;
use Illuminate\Http\Request;

class CompanyTypeController extends Controller
{
    /**
     * Handle votes to specify the type of contractor
     */
    public function vote(Request $request, $companyId)
    {
        $company = CompanyType::firstOrCreate(['contractor_id' => $companyId]);
        
        switch ($request->type) {
            case 'govtparastatal':
                $company->govt_official += 1;
                break;

            case 'privatecompany':
                $company->company += 1;
                break;
            
            case 'privatecontractor':
                $company->individual += 1;
                break;

            case 'govtofficial':
                $company->govt_official += 1;
                break;

            default:
                # code...
                break;
        }

        $company->save();

        return $company;
    }
}
