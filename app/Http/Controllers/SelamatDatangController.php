<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SelamatDatangController extends Controller
{
    public function index()
    {
        return view('selamat-datang');
    }
}
