<?php

namespace App\Models\home\book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    public $primaryKey = 'id';
    //一个作者有多篇文章
    public function findArticles(){
        return $this->hasMany(Article::class,'author_id','id');
    }
}
