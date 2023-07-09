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
        $historis = Histori::all();
        $petugasList = Petugas::pluck('nama', 'id');

        return view('pages.admin.DataRiwayatTindakan.index', [
            'complains' => Komplain::all(),
            'barangs' => Barang::all(),
            'merks' => Merk::all(),
            'petugasList' => $petugasList,
            'historis' => $historis,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Tindakan' => ['required', 'string'],
            'tanggal_pembelian' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'id_petugas' => ['required', 'exists:staffs,id'],
        ]);

        if(!$validated){
            return redirect()->route('pages.admin.dataRiwayatTindakan.index')->with('error', 'validated failed!');
        }

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'Tindakan' => ['required', 'string'],
            'tanggal_pembelian' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'id_petugas' => ['required', 'exists:staffs,id'],
        ]);

        $histori = Histori::find($id);

        if (!$histori) {
            return redirect()->route('admin.dataRiwayatTindakan.index')->with('error', 'Merk not found');
        }

        $histori->tindakan = $validated['tindakan'];
        $histori->tanggal_pembelian = $validated['tanggal_pembelian'];
        $histori->tanggal_selesai = $validated['tanggal_selesai'];
        $histori->id_petugas = $validated['id_petugas'];
        $histori->save();

        return redirect()->route('admin.dataRiwayatTindakan.index')->with('success', 'Data merk berhasil diperbarui.');
    }
   
    public function edit($id)
    {
        $histori = Histori::find($id);

            if (!$histori) {
                return redirect()->route('admin.dataRiwayatTindakan.index')->with('error', 'Merk not found');
            }

            return view('pages.admin.dataRiwayatTindakan.edit', ['histori' => $histori]);
    }
}
