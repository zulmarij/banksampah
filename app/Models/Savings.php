<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\FormatDate;

class Savings extends Model
{
    use FormatDate, HasRoles;

    protected $fillable = [
        'user_id', 'trash_id', 'information', 'weight', 'debit', 'credit', 'balance', 'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
