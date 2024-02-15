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
        // $data = [
        //     'jumlahWisatawan',
        //     'jumlahPenyewaan'
        // ];
        // Controller atau file lainnya
        $data = [
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            'data' => [10, 25, 18, 32, 20],
        ];

        return view('dashboard.index', compact('data'));

        return view('dashboard.index');
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
