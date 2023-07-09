<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ComplainByMerkController extends Controller
{
    public function index()
    {
    $complains = DB::select("
        SELECT merks.id, merks.nama AS nama_merk, COUNT(komplain.id) AS jumlah_complain
        FROM barang
        LEFT JOIN merks ON barang.id_merk = merks.id
        LEFT JOIN komplain ON barang.id = komplain.id_barang
        GROUP BY merks.id, merks.nama
        ORDER BY jumlah_complain DESC
    ");

    return view('pages.manager.ComplainByMerk.index', ['complains' => $complains]);
    }
}
