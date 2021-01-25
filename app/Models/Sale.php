<?php

namespace App\Models;

use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Sale extends Model
{
    use HasRoles, FormatDate;
    protected $fillable = ['trash_id', 'weight', 'price', 'revenue'];

    public function trash()
    {
        return $this->belongsTo(Trash::class, 'trash_id');
    }
}
