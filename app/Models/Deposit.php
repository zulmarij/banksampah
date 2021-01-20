<?php

namespace App\Models;
use App\Traits\FormatDate;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
class Deposit extends Model
{
    use HasRoles, FormatDate;

    protected $fillable = [
        'user_id', 'trash_id', 'weight', 'revenue',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trash() {
        return $this->belongsTo(Trash::class);
    }
}
