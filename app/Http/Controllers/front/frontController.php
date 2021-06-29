<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class frontController extends Controller
{
    public function index()
    {
        $result = \Http::get("http://globaldentaldata.com/api/get_branches");
        $result= json_decode($result);

        return view('front.index',compact('result'));
    }
}
