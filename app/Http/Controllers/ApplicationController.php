<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {

        $applications = App\Application::all();


        return $applications;
    }

    public function store(Request $request)
    {

        $massage= [
        'full_name.min' => 'короткое имя',
        'full_name.string'=> 'введите имя',
        'full_name.max'=>'максимальная длина 48 символов',
        'username.min' => ' короткий login',
        'username.string'=> 'введите login',
        'username.max'=>'максимальная длина 48 символов',
        'email' => 'неправильный email',
        'password.required'=>'недопустимый пароль',
        'password.min'=>'недопустимый пароль',
        'password.max'=>'недопустимый пароль',
        'password.confirmed'=> 'неправильный повтор',
            ];

        $rules=[
        'full_name' => 'string|min:3|max:48',
        'username' => 'required|min:3|max:200',
        'password'=> 'required|min:6|max:20|confirmed',
        'email' => 'email',
            ];

        $this->validate($request,$rules, $massage);
        $application = new App\Application;
        $application->full_name = $request->full_name;
        $application->username = $request->username;
        $application->password = $request->password;
        $application->email = $request->email;
        $application->save();

        return $application;
    }
    public function edit(Request $request, $id)
    {
        $massage= [
        'full_name.min' => 'имя короткое имя',
        'full_name.string'=> 'введите имя',
        'full_name.max'=>'максимальная длина 48 символов',
        'username.min' => ' короткое имя',
        'username.string'=> 'введите имя',
        'username.max'=>'максимальная длина 48 символов',
        'email' => 'неправильный email',
        'password'=>'недопустимый пароль',
        'password.confirmed'=> 'неправильный повтор',
        ];

        $rules=[
        'full_name' => 'string|min:3|max:48',
        'username' => 'required|min:3|max:200',
        'password'=> 'required|min:6|max:20|confirmed',
        'email' => 'email',
        ];

        $this->validate($request,$rules, $massage);
        $application = App\Application::findOrFail($id);
        $application->full_name = $request->full_name;
        $application->username = $request->username;
        $application->password = $request->password;
        $application->email = $request->email;
        $application->save();
        return $application;
    }
    public function delete(Request $request, $id)
    {

        $application = App\Application::findOrFail($id);
        $application->delete();
        return '';
    }
     public function approve(Request $request, $id)
     {
         $application = App\Application::findOrFail($id);
         $application->is_approved = true;
         $application->save();
         return $application;
     }

}
