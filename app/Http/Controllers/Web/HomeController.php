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
        $user = User::where('role_id', 1)->where('deleted_at', null)->count();
        $Finance = Finance::latest()->first('saldo');
        $Sale = Sale::whereMonth('created_at', $month)->sum('penghasilan');
        $transaksi = Deposit::whereMonth('created_at', $month)->count();;

        // Pie grafik
        $jenis_sampah = Trash::all();
        foreach ($jenis_sampah as $value) {
            $jenis[] = $value->jenis_sampah;
        }

        foreach ($jenis_sampah as $value) {
            $warna[] = $value->warna;
        }

        $sampahh = Warehouse::all();
        foreach ($sampahh as $value) {
            $sampah[] = $value->berat;
        }

        // chart penghasilan
        if (request()->url() == 'http://localhost:8000/home') {
            // query mysql untuk localhost
            $penghasilann = DB::table("Sales")
                ->select(DB::raw("(SUM(penghasilan)) as penghasilan"))
                ->groupBy(DB::raw("MONTH(created_at)"))
                ->get();
        } else {
            // Untuk production query pgsql heroku
            $penghasilann = DB::table("Sales")
                ->select(DB::raw("DATE_TRUNC('month',created_at) AS bulan, SUM(penghasilan) as penghasilan"))
                ->groupBy(DB::raw("DATE_TRUNC('month',created_at)"))
                ->get();
        }

        $penghasilan = [];

        foreach ($penghasilann as  $value) {
            $penghasilan[] =  $value->penghasilan;
        }

        return view('pages.home', compact('user', 'Finance', 'Sale', 'transaksi', 'jenis', 'sampah', 'warna', 'jenis_sampah', 'penghasilan'));
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
