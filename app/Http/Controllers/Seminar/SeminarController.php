<?php

namespace App\Http\Controllers\Seminar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeminarController extends Controller
{
    public function register(Request $request)
    {
        $i = 1;
    }

    public function show()
    {
        return view('pages\seminar\manage_seminar');
    }
}
