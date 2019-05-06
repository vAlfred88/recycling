<?php

namespace App\Http\Controllers\Api;

use App\MetalCost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MetalController extends Controller
{
    public function index()
    {
        $records_yesterday = MetalCost::whereDate('created_at',Carbon::yesterday())->select('metal','cost')->get();
        $records_today = MetalCost::whereDate('created_at',Carbon::today())->select('metal','cost')->get();

    return response()->json(['today'=>$records_today,'yesterday'=>$records_yesterday],200);
    }
}
