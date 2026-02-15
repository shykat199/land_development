<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $usersPerDay = User::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as count')
        )
            ->groupByRaw('DATE(created_at)')
            ->orderBy('date', 'ASC')
            ->get();

        return view('admin.dashboard', compact('usersPerDay'));
    }
}
