<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Chat extends Model
{
    use HasRoles;
    protected $fillable = ['from', 'to', 'message', 'is_read'];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('H:i');
    }
}
