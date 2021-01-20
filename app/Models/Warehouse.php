<?php

namespace App\Models;
use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use FormatDate;

    protected $fillable = [
        'trash_id', 'weight',
    ];

    public function trash() {
        return $this->belongsTo('App\Models\Trash', 'trash_id', 'id');
    }
}
