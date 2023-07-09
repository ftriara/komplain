<?php

namespace App\Http\Controllers\manager;

use App\Models\Komplain;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplainByBarangController extends Controller
{
    
    public function index()
    {
        $complains = DB::select("
            SELECT barang.id, barang.nama, COUNT(komplain.id) AS jumlah_complain
            FROM barang
            LEFT JOIN komplain ON komplain.id_barang = barang.id
            GROUP BY barang.nama, barang.id
            ORDER BY jumlah_complain DESC
        ");

        return view('pages.manager.ComplainByBarang.index', ['complains' => $complains]);
    }
}
