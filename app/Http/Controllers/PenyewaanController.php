<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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
        $data = [
            'penyewaan' => $this->userModel->all()
        ];
        
        return view('penyewaan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Penyewaan $penyewaan)
    {
        $data = [
            'penyewaan' => $penyewaan,
        ];
        return view('penyewaan.tambah', [
            'penyewaan' => $penyewaan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Penyewaan $penyewaan)
    {
        $data = $request->validate([
            'waktu_penyewaan' => 'required',
        ]);


        // if ($request->hasFile('foto_lahan') && $request->file('foto_lahan')->isValid()) {
        //     $foto_file = $request->file('foto_lahan');
        //     $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
        //     $foto_file->move(public_path('foto'), $foto_nama);
        //     $data['foto_lahan'] = $foto_nama;

        if ($penyewaan->create($data)) {
            return redirect('/penyewaan')->with('success', 'Data penyewaan baru berhasil ditambahkan');
        }
        return back()->with('error', 'Data penyewaan gagal ditambahkan');
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
        $data = [
            'penyewaan' =>  Penyewaan::where('id_penyewaan', $id)->get()
        ];

        return view('penyewaan.edit', $data);
    }

    public function detail(Penyewaan $penyewaan, string $id)
    {
        $data = [
            'penyewaan' => Penyewaan::where('id_penyewaan', $id)->get(),
        ];

        return view('penyewaan.detail', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penyewaan $penyewaan)
    {
        $data = $request->validate([
            'id_penyewaan' => ['required'],
            'waktu_penyewaan' => ['required'],
        ]);

        $id_penyewaan = $request->input('id_penyewaan');
        // dd($data);
        if ($id_penyewaan !== null) {
            // Process Update
            $dataUpdate = $penyewaan->where('id_penyewaan', $id_penyewaan)->update($data);

            if ($dataUpdate) {
                return redirect('/penyewaan')->with('success', 'Data Penyewaan berhasil di update');
            } else {
                return back()->with('error', 'Data Penyewaan gagal di update');
            }
        }
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
                'pesan'   => 'Data jenis surat berhasil dihapus'
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

    public function cetakPenyewaan(Penyewaan $penyewaan) 
    {
        $penyewaan = $penyewaan->all();
        $pdf = Pdf::loadView('penyewaan.cetak',['penyewaan' => $penyewaan]);
        return $pdf->download('penyewaan.pdf');

    }
}
