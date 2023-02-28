<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        return view('frontend.index');
    }

    public function detailPost()
    {
        return view('frontend.detail');
    }

    public function pagePost()
    {
        return view('frontend.listpage');
    }
}
