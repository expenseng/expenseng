<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\DB;
use Illuminate\Support\Facades\DB;

class Expenditure extends Controller
{
    //
    public function index(){
        $users = \App\Expenditure::all();
        // $users = DB::select('select * from monthly_budget_economicexpenditure');
        return $users;
    }

    public function store(){
        DB::insert('insert into monthly_budget_economicexpenditure (name, budget, allocation, total_allocation, balance) values(?,?,?,?,?)', ['2nd Niger Bridge', '10000000000', '1000000000', '2000000000', '7000000000']);
        $users = DB::select('select * from monthly_budget_economicexpenditure');
        return $users;
    }
}
