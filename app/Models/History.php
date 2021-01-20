<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\FormatDate;

class History extends Model
{
    use HasRoles, FormatDate;

    protected $fillable = [
        'user_id', 'trash_id', 'weight', 'revenue',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
