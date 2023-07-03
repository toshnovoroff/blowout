<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoyaltyController extends Controller
{
    public function index()
{
    $visitCount = Auth::user()->visitCount;

    return view('loyalty', compact('visitCount'));
}
}
