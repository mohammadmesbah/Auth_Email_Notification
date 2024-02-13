<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait TestTrait{
    public function getData($model){
        return $model::all();
    }
    /*
    //to write scope query with trait 
    public function scopeName($query){
        $query->where('name','AYA');
    } */
}
