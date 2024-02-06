<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Mitra;
    }

    public function index()
    {
        $data = [
            'mitra' => DB::table('view_mitra')->get(),
            'totalMitra' => DB::select("SELECT CountMitra() as totalMitra")[0]->totalMitra
        ];

        return view('mitra.index', $data);
    }


    // public function index(Mitra $mitra)
    // {

    //     $totalMitra = DB::select("SELECT CountMitra() as totalMitra")[0]->totalMitra;

    //     $data = [
    //         'mitra' => $this->userModel->all(),
    //         'totalMitra' => $totalMitra
    //     ];
    //     // dd($data);
    //     return view('mitra.index', $data);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Mitra $mitra)
    {
        $data = [
            'mitra' => $mitra,
        ];
        return view('mitra.tambah', [
            'mitra' => $mitra,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_mitra' => 'required',
            'foto_mitra' => 'sometimes',
            'bisnis_mitra' => 'required',
            'kontak_mitra' => 'required',
        ]);

        if ($request->hasFile('foto_mitra') && $request->file('foto_mitra')->isValid()) {
            $foto_file = $request->file('foto_mitra');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_mitra'] = $foto_nama;
        }

        $result = DB::statement('CALL CreateMitra(?, ?, ?, ?)', [
            $data['nama_mitra'],
            $data['foto_mitra'],
            $data['bisnis_mitra'],
            $data['kontak_mitra'],
        ]);

        if ($result) {
            return redirect('/mitra')->with('success', 'Data mitra baru berhasil ditambahkan');
        }

        return back()->with('error', 'Data mitra gagal ditambahkan');
    }

    // public function store(Request $request, Mitra $mitra)
    // {
    //     $data = $request->validate([
    //         'nama_mitra' => 'required',
    //         'foto_mitra' => 'sometimes',
    //         'bisnis_mitra' => 'required',
    //         'kontak_mitra' => 'required',
    //     ]);


    //     if ($request->hasFile('foto_mitra') && $request->file('foto_mitra')->isValid()) {
    //         $foto_file = $request->file('foto_mitra');
    //         $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
    //         $foto_file->move(public_path('foto'), $foto_nama);
    //         $data['foto_mitra'] = $foto_nama;
    //     }

    //     if ($mitra->create($data)) {
    //         return redirect('/mitra')->with('success', 'Data mitra baru berhasil ditambahkan');
    //     }
    //     return back()->with('error', 'Data mitra gagal ditambahkan');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Mitra $mitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mitra $mitra, string $id)
    {
        $data = [
            'mitra' =>  Mitra::where('id_mitra', $id)->get()
        ];

        return view('mitra.edit', $data);
    }

    public function detail(mitra $mitra, string $id)
    {
        $data = [
            'mitra' =>  Mitra::where('id_mitra', $id)->get()
        ];

        return view('mitra.detail', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mitra $mitra)
    {
        $data = $request->validate([
            'nama_mitra' => 'required',
            'bisnis_mitra' => 'required',
            'foto_mitra' => 'sometimes',
            'kontak_mitra' => 'required',
        ]);

        $id_mitra = $request->input('id_mitra');

        if ($id_mitra !== null) {
            if ($request->hasFile('foto_mitra')) {
                $foto_file = $request->file('foto_mitra');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);

                $update_data = $mitra->where('id_mitra', $id_mitra)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['foto_mitra'] = $foto_nama;
            }
            $dataUpdate = $mitra->where('id_mitra', $id_mitra)->update($data);

            if ($dataUpdate) {
                return redirect('mitra')->with('success', 'Data mitra berhasil di update');
            } else {
                return back()->with('error', 'Data mitra gagal di update');
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mitra $mitra, Request $request)
    {
        $id_mitra = $request->input('id_mitra');

        $aksi = $mitra->where('id_mitra', $id_mitra)->delete();

        if ($aksi) {
            // Pesan Berhasil
            $pesan = [
                'success' => true,
                'pesan'   => 'Data mitra berhasil dihapus'
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

    public function cetakMitra(Mitra $mitra)
    {
        $mitra = $mitra->all();
        $pdf = Pdf::loadView('mitra.cetak', ['mitra' => $mitra]);
        return $pdf->download('mitra.pdf');
    }
}