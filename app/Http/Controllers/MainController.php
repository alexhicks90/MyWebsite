<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers;

class MainController extends Controller
{
    public function index() {
        return view ('index');
    }
}
