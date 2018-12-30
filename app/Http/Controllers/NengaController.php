<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NengaController extends Controller
{
    public function new() {
        return view('nenga.new');
    }
}
