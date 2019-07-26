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
            'full_name.min' => 'имя короткое имя',
            'full_name.string'=> 'введите имя',
            'full_name.max'=>'максимальная длина 48 символов',
            'username.min' => 'имя короткое имя',
            'username.string'=> 'введите имя',
            'username.max'=>'максимальная длина 48 символов',
            'email' => 'неправильный email',
            'password'=>'недопустимый пароль',
            'password_cofirmation'=> 'неправильный повтор',
            ];
        $this->validate($request,[
        'full_name' => 'string|min:3|max:48',
        'username' => 'required|min:3|max:200',
        'password'=> 'required|min:6|max:20',
        'password_cofirmation'=> 'password_cofirmation',
        'email' => 'email',
        ], $massage);
        $application = new App\Application;
        $application->full_name = $request->full_name;
        $application->username = $request->username;
        $application->password = $request->password;
        $application->password_confirmation = $request->password_confirmation;
        $application->email = $request->email;
        $application->save();

        return $application;
    }
    public function edit(Request $request, $id)
    {

        $application = App\Application::findOrFail($id);
        $application->full_name = $request->full_name;
        $application->username = $request->username;
        $application->password = $request->password;
        $application->password_confirmation = $request->password_confirmation;
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
