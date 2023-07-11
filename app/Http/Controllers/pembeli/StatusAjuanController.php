<?php

namespace App\Http\Controllers\pembeli;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Komplain;
use App\Models\Barang;
use App\Models\Histori;
use App\Models\Merk;

class StatusAjuanController extends Controller
{
    public function index(Request $request){
        //$complains = Komplain::with('barang.merks')->get();
        return view('pages.pembeli.status_ajuan.index', [
            'complains' => Komplain::all(),
            'barang' => Barang::all(),
            'merk' => Merk::all(),
            'historis' => Histori::all(),
        ]);
    }
}
