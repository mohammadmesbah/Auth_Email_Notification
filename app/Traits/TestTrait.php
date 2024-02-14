<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait TestTrait{
    public function getData($model){
        return $model::all();
    }
    
    //to write scope query with trait 
    /* public function scopeActive(Builder $query): void
    {
        $query->where('name', 'AYA');
    } */
}
