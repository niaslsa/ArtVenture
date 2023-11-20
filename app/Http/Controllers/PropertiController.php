<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use Illuminate\Http\Request;

class PropertiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Properti;
    }
    public function index(Properti $properti)
    {
        $data = [
            'properti' => $this->userModel->all()
        ];
        // dd($data);
        return view('properti.index', $data);
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
    public function show(Properti $properti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Properti $properti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Properti $properti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Properti $properti)
    {
        //
    }
}
