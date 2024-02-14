<?php
use Illuminate\Support\Facades\Auth;

if(! function_exists('username')){
    function username(){
        return Auth::user()->name;
    }
}