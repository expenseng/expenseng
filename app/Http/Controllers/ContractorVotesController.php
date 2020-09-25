<?php

namespace App\Http\Controllers;

use App\ContractorVotes;
use Illuminate\Http\Request;

class ContractorVotesController extends Controller
{
    /**
     * Handle votes to specify the type of contractor
     */
    public function vote(Request $request, $companyId)
    {
        //find the previous voting record of the company
        $votesRecord = ContractorVotes::where(
            ['contractor_id' => $companyId, 
            'type' => $request->type]
        )->count();
        
        if ($votesRecord > 0) {
            $contractor = ContractorVotes::where('contractor_id', $companyId)
                ->where('type', $request->type)
                ->first();
            
            $contractor->count += 1;
            $contractor->save();
        } else {
            $contractor = ContractorVotes::create(
                [
                    'contractor_id' => $companyId,
                    'type' => $request->type,
                    'count' => 1
                ]
            );
        }

    }

    public function type($companyId){
        return ContractorVotes::where('contractor_id', $companyId)->first();
    }
}
