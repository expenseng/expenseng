<?php

namespace App\Http\Controllers;

use App\Company;
use App\Payment;
use App\SearchHistory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find(Request $request)
    {
        $text = $request->text;
        $contractors = Company::where('name', 'like', '%' . $text . '%')->orderBy('id', 'desc')->get();
        $contracts = Payment::where('organization', 'like', '%' . $text . '%')
            ->orWhere('description', 'like', '%' . $text . '%')
            ->orWhere('beneficiary', 'like', '%' . $text . '%')
            ->orderBy('id', 'desc')
            ->get();

        $search_history = SearchHistory::where('text', $text)->first();

        if($search_history) {
            $search_history->count += 1;
        } else {
            $search_history= new SearchHistory();
            $search_history->text = $text;
        }

        $search_history->save();
        // dd($contractors);
        return view('pages.search', compact('contractors', 'contracts'));
    }
}
