<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Fisioterapi;
use App\Models\Perawat;
use App\Models\User;
use Illuminate\Http\Request;

class FisioterapiController extends Controller
{
    public function index()
    {
        $fisioterapi = Fisioterapi::orderBy('created_at', 'asc')->take(9)->get();
        $perawat = Perawat::with('user')->where('status', '=', '0')->orderBy('created_at', 'asc')->paginate(9);
        return view('frontend.fisioterapi.index', compact('fisioterapi', 'perawat'));
    }
}
