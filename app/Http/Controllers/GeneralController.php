<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $setting = SiteSetting::first();
        return view('welcome', compact('setting'));
    }
}
