<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    public function karyawan(){
        return view('admin.simulasi.index5');
    }
}
