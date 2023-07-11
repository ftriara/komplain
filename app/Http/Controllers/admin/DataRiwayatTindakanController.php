<?php

namespace App\Http\Controllers\admin;

use App\Models\Barang;
use App\Models\Merk;
use App\Models\Komplain;
use App\Models\Histori;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataRiwayatTindakanController extends Controller
{
    
    
    public function index()
    {
        // $historis = Histori::all();
        // $kompains = Komplain::all();

        // $komplain = 
        // $histori = $historis->get('tindakan', 'tanggal_tindakan', 'tanggal_selesai', 'id_petugas', 'id_komplain');
        
        $petugasList = Petugas::pluck('nama', 'id');
        return view('pages.admin.DataRiwayatTindakan.index', [
            'complains' => Komplain::all(),
            'barangs' => Barang::all(),
            'merks' => Merk::all(),
            'historis' => Histori::all(),
            'petugas' => Petugas::all(),
            'petugasList' => $petugasList
        ]);
    }

    public function store(Request $request)
    {

        // $complainId = $request->input('complainId');
        // $tindakan = $request->input('newStatus');

        // $complain = Komplain::find($complainId);
        // $complain->status = $newStatus;
        // $complain->save();

        // $all = $request->get('id_petugas');
        // ddd($all);

        // $id_komplain = $request->get('id_komplain');
        // $historis = Histori::where('id_komplain', $id_komplain)->get();
        // $histori = $historis->pluck('tindakan', 'tanggal_tindakan', 'tanggal_selesai', 'id_petugas', 'id_komplain');

        $validatedData = $request->validate([
            'tindakan' => ['required', 'string'],
            'tanggal_tindakan' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'id_petugas' => ['required', 'exists:petugas,id'],
            'id_komplain' => ['required', 'exists:komplain,id'],
        ]);


        if(!$validatedData){
            return redirect()->route('admin.dataRiwayatTindakan.index')->with('error', 'validated failed!');
        }

        Histori::create($validatedData);

        return redirect()->route('admin.dataRiwayatTindakan.index')->with('success', 'Data berhasil disimpan!');

    }

}
