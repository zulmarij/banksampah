<?php

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Finance;
use App\Models\Sale;
use App\Models\Deposit;
use App\Models\Trash;
use App\Models\Warehouse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Withdrawal;

class HomeController extends Controller
{
    public function index()
    {
        $month = date('m');

        // Card
        $user = User::where('deleted_at', null)->count();
        $Finance = Finance::latest()->first('balance');
        $Sale = Sale::whereMonth('created_at', $month)->sum('revenue');
        $transaksi = Deposit::whereMonth('created_at', $month)->count();;

        // Pie grafik
        $trash_id = Trash::all();
        foreach ($trash_id as $value) {
            $jenis[] = $value->trash_id;
        }

        foreach ($trash_id as $value) {
            $warna[] = $value->warna;
        }

        $sampahh = Warehouse::all();
        foreach ($sampahh as $value) {
            $sampah[] = $value->berat;
        }

        // chart revenue
        if (request()->url() == 'http://localhost:8000/home') {
            // query mysql untuk localhost
            $revenuee = DB::table("sales")
                ->select(DB::raw("(SUM(revenue)) as revenue"))
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();
        } else {
            // Untuk production query pgsql heroku
            $revenuee = DB::table("sales")
                ->select(DB::raw("DATE_TRUNC('month',created_at) AS bulan, SUM(revenue) as revenue"))
                ->groupBy(DB::raw("DATE_TRUNC('month',created_at)"))
                ->get();
        }

        $revenue = [];

        foreach ($revenuee as  $value) {
            $revenue[] =  $value->revenue;
        }

        return view('pages.home', compact('user', 'Finance', 'Sale', 'transaksi', 'jenis', 'sampah', 'warna', 'trash_id', 'revenue'));
    }

    public function alert()
    {
        $permintaan = Withdrawal::where('status', 1)->count();

        echo json_encode($permintaan);
    }

    public function laporan()
    {
    }
}
