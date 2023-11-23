<?php

namespace App\Http\Controllers;

use App\Models\Lahan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Lahan;
    }
    public function index(Lahan $lahan)
    {
        $data = [
            'lahan' => $this->userModel->all()
        ];
        
        return view('lahan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lahan $lahan)
    {
        $data = [
            'lahan' => $lahan,
        ];
        return view('lahan.tambah', [
            'lahan' => $lahan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lahan $lahan)
    {
        $data = $request->validate([
            'nama_lahan' => 'required',
            'lokasi_lahan' => 'required',
            'foto_lahan' => 'required',
        ]);


        if ($request->hasFile('foto_lahan') && $request->file('foto_lahan')->isValid()) {
            $foto_file = $request->file('foto_lahan');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_lahan'] = $foto_nama;
        }

        if ($lahan->create($data)) {
            return redirect('/lahan')->with('success', 'Data lahan baru berhasil ditambahkan');
        }
        return back()->with('error', 'Data lahan gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lahan $lahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lahan $lahan, string $id)
    {
        $data = [
            'lahan' =>  Lahan::where('id_lahan', $id)->get()
        ];

        return view('lahan.edit', $data);
    }

    public function detail(Lahan $lahan, string $id)
    {
        $data = [
            'lahan' => Lahan::where('id_lahan', $id)->get(),
        ];

        return view('lahan.detail', $data);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lahan $lahan)
    {
        $data = $request->validate([
            'nama_lahan' => ['required'],
            'lokasi_lahan' => ['required'],
            'foto_lahan' => ['sometimes'],
        ]);

        $id_lahan = $request->input('id_lahan');
        // dd($data);
        if ($id_lahan !== null) {
            // Process Update
            $dataUpdate = $lahan->where('id_lahan', $id_lahan)->update($data);

            if ($dataUpdate) {
                return redirect('/lahan')->with('success', 'Data lahan berhasil di update');
            } else {
                return back()->with('error', 'Data lahan gagal di update');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lahan $lahan, Request $request)
    {
        $id_lahan = $request->input('id_lahan');

        $aksi = $lahan->where('id_lahan', $id_lahan)->delete();

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
}
