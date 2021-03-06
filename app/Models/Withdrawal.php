<?php

namespace App\Models;

use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use FormatDate;

    protected $fillable = ['user_id', 'name', 'account', 'information', 'status', 'credit', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
