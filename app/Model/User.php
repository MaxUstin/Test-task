<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

  //Отношение многие-ко-многим

  public function articles()
  {
    return $this->belongsToMany('Article');
  }

  public $timestamps = true;
 
	protected $fillable = [
        'nickname', 
        'name', 
        'surname', 
        'avatar',
        'phone',
        'sex', 
        'showPhone'
    ];

  //Получить все статьи пользователя

  public function getListArticle($id)
  {
        $user = User::find($id);
        $articles = $user->articles;
        return $articles;
  }

  //Получить опыт пользователя
  public function experience($id)
  {
      $user = User::find($id);
      $experience = $user->select('experience');
      return $experience;
  }

  //Асинхронный вывод
  public function asynch($experience)
  {
      $experience = $this->rand(1, 100);
      sleep(10);
      return $experience;
  }
}
