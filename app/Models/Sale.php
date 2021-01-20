<?php

namespace App\Models;

use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Sale extends Model
{
    use HasRoles, FormatDate;
    protected $guarded = [];
}
