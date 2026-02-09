<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Rakibhstu\Banglanumber\NumberToBangla;

class FrontendController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function print($token)
    {
        $user = User::with(['userLandInfo', 'userRevenueInfo'])->where('user_code', $token)->firstOrFail();

        return view('index', compact('user'));
    }

    public function dakhila($user_code)
    {
        $numto = new NumberToBangla();
        $user = User::with(['userLandInfo', 'userRevenueInfo'])
            ->where('user_code', $user_code)
            ->firstOrFail();

        $allSetting = getSettingsData(['form_number','cromik_number','appendix','paragraph','fiscal_year','form_title','bd_form_title','cromik_number_title','fiscal_year_title','footer_title','appendix_title']);


        return view('index', compact('user','allSetting','numto'));
    }

    public function qrDakhila($user_code)
    {
        $numto = new NumberToBangla();
        $user = User::with(['userLandInfo', 'userRevenueInfo'])
            ->where('user_code', $user_code)
            ->firstOrFail();

        $allSetting = getSettingsData(['form_number','cromik_number','appendix','paragraph','fiscal_year','form_title','bd_form_title','cromik_number_title','fiscal_year_title','footer_title','appendix_title']);


        return view('qr-index', compact('user','allSetting','numto'));
    }
}
