<?php

namespace App\Http\Controllers;

use App\Models\home\book\Article;
use App\Models\home\book\Author;
use Illuminate\Http\Request;

class DbController extends Controller
{
    //一对一
    public function findAuthor(){
        $article = Article::find(1);
    }
    //一对多
    public function findArticles(){
        $author = Author::find(1);
        //联合查询作者id为1的所有文章
        $article = $author->findArticles;
        foreach ($article as $key => $model) {
            dump($author->id.'  '.$author->author_name.'  '.$model->article_name);
        }
    }
    //多对多
    public function belongTo(){
        
    }
}
