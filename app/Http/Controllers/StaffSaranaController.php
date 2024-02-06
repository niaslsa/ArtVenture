<?php

namespace App\Http\Controllers;

use App\Models\StaffSarana;
use Illuminate\Http\Request;

class StaffSaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StaffSarana $sarana)
    {
        $data = [
            'sarana'=> $sarana->all()
        ];
        return view('sarana.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffSarana $staffSarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffSarana $staffSarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffSarana $staffSarana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffSarana $staffSarana)
    {
        //
    }
}
