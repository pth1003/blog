<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

function countPost()
{
    $countPost = Post::all()->count();
    return $countPost;
}

function countCategory()
{
    $countCategory = Category::all()->count();
    return $countCategory;
}

function countUser()
{
    $countUser = User::all()->count();
    return $countUser;
}
