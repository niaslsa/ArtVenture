<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PenyewaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Penyewaan;
    }
    public function index(Penyewaan $penyewaan)
    {
        $totalPenyewaan = DB::select('SELECT CountTotalPenyewaan() AS totalPenyewaan')[0]->totalPenyewaan;
        $data = [
            'penyewaan' => $this->userModel->all(),
            'jumlahPenyewaan' => $totalPenyewaan
        ];

        return view('penyewaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyewaan $penyewaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyewaan $penyewaan, string $id)
    {
        //
    }

    public function detail(Penyewaan $penyewaan, string $id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyewaan $penyewaan)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penyewaan $penyewaan, Request $request)
    {
        $id_penyewaan = $request->input('id_penyewaan');

        $aksi = $penyewaan->where('id_penyewaan', $id_penyewaan)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data penyewaan berhasil dihapus'
            ];
        } else {
            // Pesan Gagal
            $pesan = [
                'success' => false,
                'pesan'   => 'Data gagal dihapus'
            ];
        }

        return response()->json($pesan);
    }

    //     return response()->json($pesan);
    // }

    public function cetakPenyewaan(Penyewaan $penyewaan)
    {
        $penyewaan = $penyewaan->all();
        $pdf = Pdf::loadView('penyewaan.cetak', ['penyewaan' => $penyewaan]);
        return $pdf->stream('penyewaan.pdf');

        
    }
}
