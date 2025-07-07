<?php

namespace App\Models\home\book;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    public $primaryKey = 'id';
    //一篇文章只有一个作者
    public function findAuthor(){
        return $this->hasOne(Author::class,'id','author_id');
    }
}
