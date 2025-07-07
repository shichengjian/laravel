<?php

namespace App\Models\home\car;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $table = 'owners';
    public $primaryKey = 'id';
}
