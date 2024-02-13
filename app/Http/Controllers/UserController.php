<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use TestTrait;
    public function retrieve(){
        return $this->getData(new User());
    }
    public function index(){
        /* $user= User::find(1);
        return $user->roles; */
        $role= Role::find(1);
        return $role->users;
    }

    public function accessor($id){
        $user= User::find($id);
        return $user->name;
    }
    public function store(){
        User::create([
            'name'=> 'aya',
            'email'=> 'aya@gmail.com',
            'password'=> Hash::make('12345678')
        ]);
        return response('ok');
    }
}
