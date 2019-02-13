<?php

namespace App\Http\Controllers\Api;

use App\Reception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReceptionController extends Controller
{
    public function index()
    {
        return Reception::all();
    }
}
