<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        /* $user= User::find(1);
        return $user->roles; */
        $role= Role::find(1);
        return $role->users;
    }
}
