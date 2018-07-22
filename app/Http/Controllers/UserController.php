<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
        public function index()
    {
        
    }

     protected function create()
    {
        return view('welcome');
    }

  

      public function store(Request $request)
    {
        //Проверка корректности ввода
        $this->validate(request(),[

            'nickname' => 'required|alpha_num|min:3',
            'name' => 'required|string|min:2',
            'surname' => 'required|string|min:2',
            'avatar' => 'required|mimes:jpeg,png',
            'phone' => 'required|max:13'
        ]);

        $user = new User;

        $user->nickname = $request->nickname;
        $user->name = $request->name;
        $user->surname = $request->surname;

        //Загрузка изображения в директорию
        if ($request->hasFile('avatar')) {
          $path = $request->file('avatar')->store('public');
          $url = Storage::url($path);
          $user->avatar = $url;
        }
        
        $user->phone = $request->phone;
        $user->sex = $request->sex;
        $user->showPhone = $request->showPhone;


        $user->save();

        return redirect()->action('UserController@show');

    }

    //Вывести текущего пользователя
    public function show()
    {
        $users = User::orderBy('created_at', 'desc')->first();
        return view('show')->withUsers($users);
    }


    public function edit(User $user)
    {
        
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
