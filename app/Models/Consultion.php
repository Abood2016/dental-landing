<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultion extends Model
{
    use HasFactory;
    protected $table = 'consultions';
    protected $guarded;
}
