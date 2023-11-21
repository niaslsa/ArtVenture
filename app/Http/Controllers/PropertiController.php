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
    public function create(Properti $properti)
    {
        $data = [
            'properti' => $properti,
        ];
        return view('properti.tambah', [
            'properti' => $properti,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Properti $properti)
    {
        $data = $request->validate([
            'nama_properti' => 'required',
            'kondisi_properti' => 'required',
            'foto_properti' => 'required', 
        ]);


        if ($request->hasFile('foto_properti') && $request->file('foto_properti')->isValid()) {
            $foto_file = $request->file('foto_properti');
            $foto_nama = md5($foto_file->getClientOriginalName() . time()) . '.' . $foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);
            $data['foto_properti'] = $foto_nama;
        }

        if ($properti->create($data)){
            return redirect('/properti')->with('success','Data properti baru berhasil ditambahkan');
    }
    return back()->with('error','Data properti gagal ditambahkan');
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
    public function edit(Properti $properti, string $id)
    {
        $data = [
            'properti' =>  Properti::where('id_properti', $id)->get()
        ];

        return view('properti.edit', $data);
    
    }

    public function detail(Properti $properti, string $id)
    {
        $data = [
            'properti' =>  Properti::where('id_properti', $id)->get()
        ];

        return view('properti.detail', $data);
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Properti $properti)
    {
        $data = $request->validate([
            'nama_properti' => 'required',
            'kondisi_properti' => 'required',
            'foto_properti' => 'sometimes', 
        ]);

        $id_properti = $request->input('id_properti');

        if ($id_properti !== null) {
            // Process Update
            $dataUpdate = $properti->where('id_properti', $id_properti)->update($data);

            if ($dataUpdate) {
                return redirect('properti')->with('success', 'Data properti berhasil di update');
            } else {
                return back()->with('error', 'Data properti gagal di update');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Properti $properti, Request $request)
    {
        $id_properti = $request->input('id_properti');

        // Hapus 
        $aksi = $properti->where('id_properti', $id_properti)->delete();

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
