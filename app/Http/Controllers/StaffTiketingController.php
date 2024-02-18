<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\StaffTiketing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class StaffTiketingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $userModel;
    public function index(StaffTiketing $staffTiketing)
    {
        $data = [
            'StaffTiketing'=> DB::table('view_staff_tiketing')->get()
        ];  
        // dd($data);
        return view('stafftiketing.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Akun $akun)
    { 
        $data = [
            'akun' => $akun->get()
        ];
        return view('stafftiketing.tambah', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, StaffTiketing $staffTiketing)
    {
        $data = $request->validate([
            'nama_st' => 'required',
            'kontak_st' => 'required',
            'id_akun' => 'required',
            'foto_st' => 'sometimes'
        ]);

        if($data && $request->hasFile('foto_st') && $request->file('foto_st')->isValid())
        {
            $foto_file = $request->file('foto_st');
            $foto_nama = md5($foto_file->getClientOriginalName().time()). '.'.$foto_file->getClientOriginalExtension();
            $foto_file->move(public_path('foto'), $foto_nama);

            $data['foto_st'] = $foto_nama;

            if (DB::statement("CALL CreateStaffTiketing(?,?,?,?)", [$data['id_akun'], $data['nama_st'], $data['kontak_st'], $data['foto_st']])) {
                return redirect('/stafftiketing');
            }

        }else{
            return back()->with('error', 'Data gagal ditambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffTiketing $staffTiketing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffTiketing $staffTiketing, Request $request, Akun $akun)
    {
        $data = [
            'item' => $staffTiketing->where('id_st', $request->id)->first(),
            'akun' => $akun->get()
        ];

        return view('stafftiketing.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffTiketing $staffTiketing)
    {
        $data = $request->validate([
            'id_akun' => 'required',
            'nama_st' => 'required',
            'kontak_st' => 'required',
            'foto_st' => 'sometimes'
        ]);

        if($data)
        {
            if($request->hasFile('foto_st') && $request->file('foto_st')->isValid())
            {
                $foto_file = $request->file('foto_st');
                $foto_nama = md5($foto_file->getClientOriginalName().time()). '.'.$foto_file->getClientOriginalExtension();
                $foto_file->move(public_path('foto'), $foto_nama);
    
                $data['foto_st'] = $foto_nama;
            }
            $staffTiketing->where('id_st',$request->id_st)->update($data);

            return redirect('/stafftiketing');
        }else{
            return back()->with('error', 'Data gagal ditambah');
        }       

        // $staffTiketing->where()->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */

    public function detail(Request $request, StaffTiketing $stafftiketing, Akun $akun)
    {
        $data = [
            'stafftiketting' => $stafftiketing->where('id_st' ,$request->id)->first(),
            'akun' => $akun->get()
        ];

        return view('stafftiketing.detail', $data);
    }



    public function destroy(StaffTiketing $staffTiketing, Request $request)
    {
        $id_st = $request->input('id_st');

        $aksi = $staffTiketing->where('id_st', $id_st)->delete();

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

    public function cetakSt(StaffTiketing $staffTiketing)
    {
        $data = [
            'StaffTiketing' => $staffTiketing->get()
        ];          
        $pdf = PDF::loadView('presensi-pdf', $data);
        return $pdf->download('presensi.pdf');
    }
}
