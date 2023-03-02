<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * dt: get datetime
     * newPost: get Post new
     * posts: get all post
     * postRandom: random post
     * idCatRandom: get id Category random
     * catRandom: get all post of category
     * catNameRandom: get name category random
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $dt = Carbon::now('Asia/Ho_Chi_Minh');
        $newPosts = Post::with('user')->orderByDesc('id')->first();
        $posts = Post::with('user')->take(5)->orderByDesc('id')->get();
        $postRandom = Post::inRandomOrder()->first();
        $idCatRandom = Category::inRandomOrder()->first()->id;
        $catRandom = Post::with('user')->where('category_id', $idCatRandom)->get();
        $catNameRandom = Category::find($idCatRandom)->name;
        return view('frontend.index', compact('posts', 'newPosts', 'postRandom', 'dt', 'catRandom', 'catNameRandom'));
    }

    /**
     * comments: get comment of post
     * postDetail: get detail of post
     * Method Post: post comment of user
     * idCatRelated: get id cat related post
     * relatedPost:
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detailPost($id, Request $request)
    {
        try {
            if ($request->method() == 'GET') {
                $comments = Comment::with('user')->where('post_id', $id)->get();
                $postDetail = Post::with('user')->where('id', $id)->get();
                foreach ($postDetail as $idCat) {
                    $idCatRelated = $idCat->category_id;
                }
                $relatedPost = Post::with('user')->where('category_id', $idCatRelated)->get();
                return view('frontend.detail', compact('postDetail', 'comments', 'relatedPost'));
            } else {
                $dataInsert = [
                    'content' => $request->contentt,
                    'post_id' => $id,
                    'user_id' => 1
                ];
                Comment::create($dataInsert);
                return redirect()->back();
            }
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
        try {
//            throw new \Exception('Errorrrr');
            $listPage = Post::where('category_id', $id)->cursorPaginate(1);
            $nameCat = Category::find($id)->name;
            return view('frontend.listpage', compact('listPage', 'nameCat'));
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error' , ['msg' => $e->getMessage()]);
        }
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
        try {
            if ($request->method() == 'GET') {
                $category = Category::all();
                return view('frontend.writeBlog', compact('category'));
            } else {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('image'), $filename);
                $dataInsert = [
                    'title' => $request->title,
                    'content' => $request->contentt,
                    'image' => $filename,
                    'category_id' => $request->category,
                    'user_id' => 1
                ];
                Post::create($dataInsert);

                return redirect()->route('frontend.index');
            }
        } catch (\Exception $e) {
            redirect()->route('frontend.error');
        }
    }

    public function error(Request $request)
    {
        $err = $request->get('msg', 'ERROR');
        return view('frontend.error', compact('err'));
    }

}
