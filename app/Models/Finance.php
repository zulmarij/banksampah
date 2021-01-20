<?php

namespace App\Models;
use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use FormatDate;

    protected $fillable = ['balance', 'debit', 'credit', 'information'];
}
