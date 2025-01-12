<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grant;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $grants = Grant::all();
        return view('dashboard.admin', compact('grants'));
    }

    public function leader()
    {
        $user = Auth::user();
        $grants = Grant::where('project_leader_id', $user->id)->get();
        return view('dashboard.leader', compact('grants'));
    }
    
    public function staff()
    {
        $user = Auth::user();
        // Assuming there is a pivot table `grant_staff` to associate staff with grants
        $grants = $user->grants; // Adjust this query based on your actual relationship
        return view('dashboard.staff', compact('grants'));
    }
}