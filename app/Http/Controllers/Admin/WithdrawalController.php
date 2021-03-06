<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Savings;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WithdrawalController extends Controller
{
    public function index()
    {
        $success = Withdrawal::where('status', 2)->count();
        $successCredit = Withdrawal::where('status', 2)->sum('credit');
        $waiting = Withdrawal::where('status', 1)->count();
        $waitingCredit = Withdrawal::where('status', 1)->sum('credit');
        $rejected = Withdrawal::where('status', 0)->count();
        $rejectedCredit = Withdrawal::where('status', 0)->sum('credit');
        $total = Withdrawal::count();
        $totalCredit = Withdrawal::sum('credit');
        $withdrawal = Withdrawal::orderBy('status', 'ASC')->get();

        return view('admin.withdrawal.index', compact('withdrawal', 'totalCredit', 'total', 'rejectedCredit', 'rejected', 'waitingCredit', 'waiting', 'successCredit', 'success'));
    }

    public function getWithdraw()
    {
        return view('admin.withdrawal.withdraw');
    }

    // POST
    public function withdraw()
    {
        request()->validate([
            'email'  => 'required|email',
            'nominal' => 'required|integer'
        ]);

        $user = User::where('email', request('email'))->firstOrfail();
        $savings = Savings::where('user_id', $user->id)->latest()->firstOrFail();

        if ($savings->balance < request('nominal')) {
            alert::warning('Message', 'Not enough nasabah Balance');
            return back();
        }

        // Tambah data di table withdrawal
        $withdrawal = Withdrawal::create([
            'user_id'    => $user->id,
            'name'       => $user->name,
            'account'   => "From Teller",
            'credit'     => request('nominal'),
            'information' => "Withdrawal Money From Teller",
            'status'     => 2
        ]);

        // tambah data di table savings nasabah
        Savings::create([
            'user_id'       => $user->id,
            'information'    => "Withdrawal Money From Teller",
            'debit'         => 0,
            'credit'        => request('nominal'),
            'balance'         => $savings->balance -= request('nominal')
        ]);

        // kurangi balance finance bank
        $finance = Finance::latest()->first('balance');

        Finance::create([
            'information' => 'Withdrawal Nasabah Money From Teller',
            'debit'      => 0,
            'credit'     => request('nominal'),
            'balance'      => $finance->balance -= request('nominal')
        ]);

        alert::success('message', 'Withdraw Money Successfully');
        return redirect('admin/withdrawal')->with('data', $withdrawal);
    }

    // Konfirmasi
    public function confirm($id)
    {
        $withdrawal = Withdrawal::where('id', $id)->first();
        $withdrawal->status = 2;
        $withdrawal->update();

        // Saldo Finance berkurang otomatis
        Finance::create([
            'information' => 'Withdrawal Money',
            'debit'      => 0,
            'credit'     => $withdrawal->credit,
            'balance'      => Finance::latest()->first()->balance -= $withdrawal->credit
        ]);

        alert::success('message', 'Money Sent Successfully');
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
            'information'    => 'Refund of Failed Transaction Money',
            'debit'         => $withdrawal->credit,
            'credit'        => 0,
            'balance'         => Savings::latest()->first()->balance += $withdrawal->credit
        ]);

        alert::success('message', 'Request Rejected Successfully');
        return back();
    }
}
