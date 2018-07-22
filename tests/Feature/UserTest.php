<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    //Тестировани формы добавления пользователя
   public function testNewUser()
{
	

  $this->visit('/')
       ->type('Max', 'name')
       ->select('male', 'sex')
       ->chek('showPhone')
       ->press('create')
       ->seePageIs('/show');
}

//Тестировани вывода имени в формате json
public function testBasicExample()
  {
    $this->json('POST', '/', ['name' => 'Max'])
         ->seeJson([
           'created' => true,
         ]);
  }

//Тестировани БД на проверку поля
public function testDatabase()
{

    $this->seeInDatabase('users', ['name' => 'Max']);
}

}
