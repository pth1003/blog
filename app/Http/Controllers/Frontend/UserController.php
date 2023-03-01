<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;;
use Carbon\Carbon;



class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * newPost: get Post new
     * post: get all post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $newPosts = Post::with('user')->orderByDesc('id')->first();
        $posts = Post::with('user')->get();
        $postRandom = Post::inRandomOrder()->first();
        return view('frontend.index', compact('posts', 'newPosts', 'postRandom', 'dt'));
    }

    /**
     * get detail post
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detailPost($id)
    {
        try {
            $postDetail = Post::with('user')->where('id', $id)->get();
            return view('frontend.detail', compact('postDetail'));
        } catch (\Exception $e) {
            redirect()->route('frontend.error');
        }
    }

    /**
     * get list page
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function pagePost($id)
    {
        $listPage = Post::where('category_id', $id)->get();
        $nameCat = Category::find($id)->name;
        return view('frontend.listpage', compact('listPage', 'nameCat'));
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function register()
    {
        return view('frontend.register');
    }

    public function writeBlog(Request $request)
    {
        if ($request->method() == 'GET') {
            $category = Category::all();
            return view('frontend.writeBlog', compact('category'));
        } else {
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $dataInsert = [
                'title'=>$request->title,
                'content'=>$request->content,
                'image'=>$filename,
                'category_id'=>$request->category,
                'user_id'=>1
            ];
            Post::create($dataInsert);

            return redirect()->route('frontend.index');

        }
    }
}
