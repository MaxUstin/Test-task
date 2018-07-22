<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
class Article extends Model
{

  //Отношение многие-ко-многим  
  public function users()
  {
    return $this->belongsToMany('User');
  }	

  //Получить всех авторов статьи
 	 public function getListUser($id)
  {
        $article = Article::find($id);
        $users = $article->users;
        return $users;
  }
  	
//Использовать мягкое удаление
use SoftDeletes; 
  
protected $dates = ['deleted_at'];		



}
