<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new Berita;
    }
    public function index(Berita $berita)
    {
        $data = [
            'berita' => $this->userModel->all()
        ];
        // dd($data);
        return view('berita.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Berita $berita)
    {
        $data = [
            'berita' => $berita,
        ];
        return view('berita.tambah', [
            'berita' => $berita,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'nama_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita' => 'sometimes', 
        ]);


        if ($request->hasFile('foto_berita') && $request->file('foto_berita')->isValid()) {
            $foto_file = $request->file('foto_berita');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_berita'] = $foto_nama;
        }

        if ($berita->create($data)){
            return redirect('/berita')->with('success','Data berita  baru berhasil ditambahkan');
    }
    return back()->with('error','Data berita gagal ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita, string $id)
    {
        $data = [
            'berita' =>  Berita::where('id_berita', $id)->get()
        ];

        return view('berita.edit', $data);
    
    }

    public function detail(Berita $berita, string $id)
    {
        $data = [
            'berita' =>  Berita::where('id_berita', $id)->get()
        ];

        return view('berita.detail', $data);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita)
    {
        $data = $request->validate([
            'nama_berita' => 'required',
            'isi_berita' => 'required',
            'foto_berita' => 'sometimes', 
        ]);

        $id_berita = $request->input('id_berita');

        if ($id_berita !== null) {
            if ($request->hasFile('foto_berita')) {
                $foto_file = $request->file('foto_berita');
                $foto_extension = $foto_file->getClientOriginalExtension();
                $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_extension;
                $foto_file->move(public_path('foto'), $foto_nama);

                $update_data = $berita->where('id_berita', $id_berita)->first();
                File::delete(public_path('foto') . '/' . $update_data->file);

                $data['foto_berita'] = $foto_nama;
            }
            $dataUpdate = $berita->where('id_berita', $id_berita)->update($data);

            if ($dataUpdate) {
                return redirect('berita')->with('success', 'Data berita berhasil di update');
            } else {
                return back()->with('error', 'Data berita gagal di update');
            }
        }
    }
     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita, Request $request)
    {
        $id_berita = $request->input('id_berita');

        // Hapus 
        $aksi = $berita->where('id_berita', $id_berita)->delete();

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
    public function cetakBerita(Berita $berita)
    {
        $berita = $berita->all();
        $pdf = Pdf::loadView('berita.cetak',['berita' => $berita]);
        return $pdf->download('berita.pdf');
    
    }
}

