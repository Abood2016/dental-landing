<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Consultion;
use App\Models\Setting;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class dashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
}
