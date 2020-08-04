<?php

namespace App\Http\Controllers;

use App\ParsingSheet;
use App\Report;
use http\Env\Response;
use Illuminate\Http\Request;

class SheetParsing extends Controller
{
    //
    public function parse(Request $request)
    {
        if ($request->ajax()) {
            try {
                $report = Report::whereId($request->id)->first();
                if (preg_match('/daily/i', $report->type)) {
                    $parse = new ParsingSheet();
                    return $parse->parseDaily($report);
                } elseif (preg_match('/monthly/i', $report->type)) {
                    $parse = new ParsingSheet();
                    return $parse->parseMonthly($report);
                } elseif (preg_match('/quarter/i', $report->type)) {
                    $parse = new ParsingSheet();
                    return $parse->parseQuarterly($report);
                }
                return Response::json(array("errors" => 'errror'), 422);
            } catch (\Exception $e) {
                return Response::json(array("errors" => 'error'), 422);
            }
        }
    }
}

