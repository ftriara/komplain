<?php

namespace App\Http\Controllers\pembeli;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

use App\Models\Merk;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Komplain;

class AjukanComplainController extends Controller
{
    public function index() {
        $barangList = Barang::pluck('nama', 'id');
        $merkList = Merk::pluck('nama', 'id');

        return view('pages.pembeli.ajukan_komplain.index', ['barangList' => $barangList], ['merkList' => $merkList]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'tanggal_pembelian' => ['required', 'date'],
            'batas_garansi' => ['required', 'date'],
            'keluhan' => ['required', 'string'],
            'id_barang_merk' => ['required', 'int'],
            'foto' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], // Validasi untuk foto
        ]);

        if(!$validated){
            return redirect()->route('pages.pembeli.ajukan_garansi.index')->with('error', 'validated failed!');
        }
        // Proses penyimpanan data barang dengan foto
        $idPembeli = auth()->user()->id;
        $status = 'Pending';

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = Str::uuid() . '.' . $file->getClientOriginalName();
            $path = $file->storeAs('foto', $filename, 'public');
            
            if(!$validated){
                return redirect()->route('pages.pembeli.ajukan_garansi.index')->with('error', 'validated failed!');
            }
        }
        

        /*// Simpan data barang beserta nama file foto ke dalam database
        $barang = new Barang();
        $barang->nama = $validated['nama'];
        $barang->merk = $validated['merk'];
        $barang->jumlah = $validated['jumlah'];
        $barang->harga = $validated['harga'];
        $barang->tanggal_pembelian = $validated['tanggal_pembelian'];
        $barang->foto = $filename;
        $barang->save();*/

        // Create Menu
        Komplain::Create([
            'tanggal_pembelian' => $validated['tanggal_pembelian'],
            'keluhan' => $validated['keluhan'],
            'id_barang' => $validated['id_barang_merk'],
            'id_pembeli' => $idPembeli,
            'batas_garansi' => $validated['batas_garansi'],
            'status' => $status,
            'foto' => $filename,
        ]);

        return redirect()->route('pembeli.status_ajuan.index')->with('success', 'Created Successfully');

    }
}
