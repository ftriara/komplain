<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ComplainByPetugasController extends Controller
{
    public function index(Request $request) {
        //echo '<script>alert("s'.($request->daterange == '' ? "asd" : "vdsv").'s");</script>';

        $start = ($request->daterange == '') ? '01/01/2000' : substr($request->daterange, 0, 10);
        $end =($request->daterange == '') ? '01/01/2100' : substr($request->daterange, -10);

        $startDate = substr($start, -4) . '-' . substr($start, 3, 2) . '-' . substr($start, 0, 2);
        $endDate = substr($end, -4) . '-' . substr($end, 3, 2) . '-' . substr($end, 0, 2);

        // $complains = DB::select("
        //     SELECT petugas.nama AS nama_petugas, COUNT(histori.id) AS jumlah_tindakan, CAST((SUM(histori.tanggal_selesai - histori.tanggal_tindakan)/COUNT(histori.id)) AS DECIMAL(10, 1)) as rerata
        //     FROM petugas
        //     LEFT JOIN histori ON petugas.id = histori.id_petugas
        //     GROUP BY petugas.nama
        //     ORDER BY nama_petugas ASC
        // ");


        $complains = DB::table("petugas")
        ->leftJoin('histori', 'histori.id_petugas', '=', 'petugas.id')
        ->selectRaw('petugas.nama as nama_petugas, count(histori.id) as jumlah_tindakan, CAST((SUM(histori.tanggal_selesai - histori.tanggal_tindakan)/COUNT(histori.id)) AS DECIMAL(10, 1)) as rerata')
        ->where('histori.tanggal_tindakan', '>=', $startDate)
        ->where('histori.tanggal_selesai', '<=', $endDate)
        ->groupBy('petugas.nama')
        ->orderBy('petugas.nama')
        ->get();
        

        //check null atau gak, kasih nilai 0 kalo null
        foreach ($complains as $complain) {
            if(!($complain->rerata)) {
                $complain->rerata = 0;
            }
        }

        return view('pages.manager.ComplainByPetugas.index', ['complains' => $complains, 'start' => $start, 'end' => $end]);
    }
}
