<?php

namespace App\Http\Controllers;
use App\Models\Profil;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $data = Profil::all();

        return view('welcome', compact('data'));
    }
}
