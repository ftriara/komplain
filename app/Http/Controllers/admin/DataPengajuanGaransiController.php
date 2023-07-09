<?php

namespace App\Http\Controllers\admin;

use App\Models\Komplain;
use App\Models\Barang;
use App\Models\Merk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DataPengajuanGaransiController extends Controller
{
    /*
    public function index(Request $request){
        $complains = Riwayat_Pengajuan_Garansi::all();
        return view('pages.admin.dataPengajuanGaransi.index', compact('complains'));
    }
    */

    public function index(Request $request){
        //$complains = Komplain::with('barang.merks')->get();
        return view('pages.admin.DataPengajuanGaransi.index', [
            'complains' => Komplain::all(),
            'barang' => Barang::all(),
            'merk' => Merk::all(),
        ]);
    }
}
