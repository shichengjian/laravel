<?php

namespace App\Models\home\car;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{
    use HasFactory;

    protected $table = 'mechanics';
    public $primaryKey = 'id';

    public function carOwner(){
        return $this->hasOneThrough(Owner::class,Car::class,);
    }
}
