<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opening extends Model
{
    use HasFactory;
    protected $table = 'openings';

    public function getFromDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('h:i');
    }
}
