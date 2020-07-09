<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function health(){
        $response = [
            [
                'label' => 'Health',
                'year' => Budget::where('project_name', 'Health')->pluck('year'),
                'amount' => Budget::where('project_name', 'Health')->pluck('amount'),
            ],
            [
                'label' => 'Security',
                'year' => Budget::where('project_name', 'Defence')->pluck('year'),
                'amount' => Budget::where('project_name', 'Defence')->pluck('amount'),
            ],
            [
                'label' => 'Housing',
                'year' => Budget::where('project_name', 'Housing and Community Amenities')->pluck('year'),
                'amount' => Budget::where('project_name', 'Housing and Community Amenities')->pluck('amount'),
            ]
        ];
        
        return $response;
    }
}
