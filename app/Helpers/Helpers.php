<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

function role()
{
    $checkLogin = Auth::check();
    if($checkLogin){
        $role = auth()->user()->getRoleNames()->first();
        return ucfirst($role);
    }
}

function category()
{
    $category = Category::all();
    return $category;
}
