<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve data from the Dashboard model if needed
        $dashboardData = Dashboard::all();

        return view('dashboard.index', compact('dashboardData'));
    }

    /**
     * Show the form for editing the user profile.
     *
     * @return \Illuminate\View\View
     */
    public function editProfile()
    {
        return view('dashboard.edit-profile');
    }

    /**
     * Update the user profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        // Logic to update user profile

        return redirect()->route('dashboard')->with('success', 'Profile updated successfully');
    }
}
