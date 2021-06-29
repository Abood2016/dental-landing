<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }
}
