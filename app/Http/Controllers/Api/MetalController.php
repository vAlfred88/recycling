<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MetalCostCollection;
use App\MetalCost;
use Illuminate\Http\Request;

class MetalController extends Controller
{
    public function index(Request $request)
    {
        $metals = MetalCost::query()
                           ->where('metal', $request->get('metal'))
                           ->orderBy('created_at', 'asc')
                           ->pluck('cost');

        return new MetalCostCollection($metals);
    }
}
