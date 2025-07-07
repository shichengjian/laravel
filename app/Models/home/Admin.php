<?php

namespace App\Models\home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
    protected $table = "admin";
    protected $primaryKey = "id";
    public $timestamps = false;

    // protected $fillable = [
    //     'name',
    //     'username',
    // ];
    
    //定义允许写入字段
    protected $guarded = [];

}
