<?php

namespace App\Http\Controllers\Front;

use App\Company;
use App\Http\Controllers\Controller;
use App\MetalCost;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $records_yesterday = MetalCost::whereDate('created_at',Carbon::yesterday())->get();
        $records_today = MetalCost::whereDate('created_at',Carbon::today())->get();
        $companies = Company::query()
                            ->take(10)
                            ->orderBy('receptions_count', 'desk')
                            ->get();

        return view('front.home', compact('companies','records_today','records_yesterday'));
    }
}
