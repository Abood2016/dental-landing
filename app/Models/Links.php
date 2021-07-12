<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Links extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded;
    protected $table= 'side_menu_links';
}
