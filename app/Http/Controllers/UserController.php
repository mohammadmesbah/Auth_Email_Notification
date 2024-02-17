<?php

namespace App\Http\Controllers;

use App\Jobs\ActiveUserStatus;
use App\Jobs\SendUserMail;
use App\Mail\Email;
use App\Models\Role;
use App\Models\User;
use App\Traits\TestTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    use TestTrait;
    public function retrieve(){
        //return $this->getData(new User());
        return $this->getData(User::class);
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

    public function jobs(){
        $user_id= User::where('status','0')->pluck('id');
        ActiveUserStatus::dispatch($user_id)->delay(now()->second(20));
        return 'جاري تنفيذ طلبك';
    }

    public function sendMail(){
        $data= ['engmohammadmesbah1@gmail.com','engmohammadmesbah1@gmail.com',
        'engmohammadmesbah1@gmail.com','engmohammadmesbah1@gmail.com'];
        
        SendUserMail::dispatch($data);
        return 'جارى إرسال الإيميلات';
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
