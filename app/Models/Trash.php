<?php

namespace App\Models;
use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
class Trash extends Model
{
    use HasRoles, FormatDate;


    protected $fillable = [
        'trash', 'price', 'image'
    ];

    public function deposit() {
        return $this->hasMany(Deposit::class);
    }

    public function history() {
        return $this->hasMany(History::class);
    }

    public function warehouse() {
        $this->hasOne('App\Models\Warehouse', 'trash_id', 'id');
    }
}
