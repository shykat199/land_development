<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }

    public function print($token)
    {
        $user = User::with(['userLandInfo', 'userRevenueInfo'])->where('user_code', $token)->firstOrFail();

        return view('index', compact('user'));
    }

    public function dakhila($user_code)
    {
        $user = User::with(['userLandInfo', 'userRevenueInfo'])
            ->where('user_code', $user_code)
            ->firstOrFail();

        // IMPORTANT: return a clean print view
        return view('dakhila-print', compact('user'));
    }
}
