<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    public function getWithdrawal()
    {
        return view('admin.withdrawal.index');
    }

    public function getRequest()
    {
        $request = Withdrawal::with('user')->where('status', 1)->get();

        return view('admin.withdrawal.request', compact('request'));
    }

    // POST
    public function withdrawal()
    {
        request()->validate([
            'email'  => 'required|email',
            'nominal' => 'required|integer'
        ]);

        $user = User::where('email', request('email'))->firstOrfail();
        $tabungan = Savings::where('user_id', $user->id)->latest()->firstOrFail();

        if ($tabungan->balance < request('nominal')) {
            alert()->warning('Gagal', 'Saldo Nasabah Tidak Cukup');
            return back();
        }

        // Tambah data di table withdrawal
        $withdrawal = Withdrawal::create([
            'user_id'    => $user->id,
            'name'       => $user->name,
            'account'   => "Melalui Teller",
            'credit'     => request('nominal'),
            'information' => request('information') ?? "Withdrawal Tunai Melalui Teller",
            'status'     => 2
        ]);

        // tambah data di table tabungan nasabah
        Savings::create([
            'user_id'       => $user->id,
            'information'    =>  request('information') ?? "Withdrawal Tunai Melalui Teller",
            'debit'         => 0,
            'credit'        => request('nominal'),
            'balance'         => $tabungan->balance -= request('nominal')
        ]);

        // kurangi balance finance bank
        $finance = Finance::latest()->first('balance');

        Finance::create([
            'information' => 'Withdrawal Dana Nasabah Melalui Teller',
            'debit'      => 0,
            'credit'     => request('nominal'),
            'balance'      => $finance->balance -= request('nominal')
        ]);

        alert()->success('Success', 'Saldo Berhasil ditarik');

        return redirect(route('finance.withdrawal'))->with('data', $withdrawal);
    }

    // Konfirmasi
    public function confrim($id)
    {
        $withdrawal = Withdrawal::where('id', $id)->first();
        $withdrawal->status = 2;
        $withdrawal->update();

        // Saldo Finance berkurang otomatis
        Finance::create([
            'information' => 'Withdrawal Uang Oleh Nasabah',
            'debit'      => 0,
            'credit'     => $withdrawal->credit,
            'balance'      => Finance::latest()->first()->balance -= $withdrawal->credit
        ]);

        alert()->success('Success', 'Dana Berhasil dikirim');
        return back();
    }

    // reject
    public function reject($id)
    {
        $withdrawal = Withdrawal::where('id', $id)->first();
        $withdrawal->status = 0;
        $withdrawal->update();

        // kembalikan balance nasabah
        Savings::create([
            'user_id'       => $withdrawal->user_id,
            'information'    => 'Pengembalian Saldo Transaksi Gagal',
            'debit'         => $withdrawal->credit,
            'credit'        => 0,
            'balance'         => Savings::latest()->first()->balance += $withdrawal->credit
        ]);

        alert()->info('Success', 'Permintaan Berhasil direject');
        return back();
    }
}
