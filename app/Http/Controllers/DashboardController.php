<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $totalSiswa = Siswa::whereNotNull('name')->count();
        $totalHobi = Hobi::whereNotNull('name')->count();
        return view('dashboard.dashboard',compact('totalSiswa','totalHobi'));
    }
}
