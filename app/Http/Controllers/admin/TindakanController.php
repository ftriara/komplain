<?php

namespace App\Http\Controllers\admin;

use App\Models\Barang;
use App\Models\Merk;
use App\Models\Komplain;
use App\Models\Histori;
use App\Models\Petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TindakanController extends Controller
{
    public function tindakan() {

        $petugasList = Petugas::pluck('nama', 'id');
        return view('pages.admin.tindakan.tindakan', [
            'complains' => Komplain::all(),
            'barangs' => Barang::all(),
            'merks' => Merk::all(),
            'historis' => Histori::all(),
            'petugas' => Petugas::all(),
            'petugasList' => $petugasList
        ]);
    }
}
