<?php

namespace App\Models;

use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use FormatDate;
    protected $table = 'withdrawals';

    protected $fillable = ['user_id', 'name', 'account', 'keterangan', 'credit', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
