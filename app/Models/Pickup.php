<?php

namespace App\Models;

use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pickup extends Model
{
    use HasRoles, FormatDate;
    
    protected $fillable = ['user_id', 'image', 'address', 'url_address', 'phone', 'description', 'status'];

    // relation
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
