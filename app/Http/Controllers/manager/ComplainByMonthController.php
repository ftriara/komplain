<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ComplainByMonthController extends Controller
{
    public function index()
    {
        $complains = DB::table('komplain')
            ->select(DB::raw('YEAR(created_at) as year, DATE_FORMAT(created_at, "%M") as month, COUNT(id) as jumlah_komplain'))
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc')
            ->orderBy(DB::raw('MONTH(created_at)'), 'asc')
            ->get();

        return view('pages.manager.ComplainByMonth.index', ['complains' => $complains]);
    }
}
