<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Hash;
use Auth;
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
        try {
            $dt = Carbon::now('Asia/Ho_Chi_Minh');
            $newPosts = Post::with('user')->orderByDesc('id')->first();
            $posts = Post::with('user')->orderByDesc('id')->simplePaginate(5);
            $postRandom = Post::inRandomOrder()->first();
            $postRandom1 = Post::inRandomOrder()->first();
            $postRandom2 = Post::inRandomOrder()->first();
            $idCatRandom = Category::inRandomOrder()->first()->id;
            $catRandom = Post::with('user')->where('category_id', $idCatRandom)->get();
            $catNameRandom = Category::find($idCatRandom)->name;
            return view('frontend.index', compact('posts', 'newPosts', 'postRandom', 'dt', 'catRandom', 'catNameRandom', 'postRandom1', 'postRandom2'));
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
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
                $comments = Comment::with('user')->where('post_id', $id)->where('status', 1)->get();
                $postDetail = Post::with('user')->where('id', $id)->get();
                $postRandom = Post::with('user')->inRandomOrder()->first();
                $idUser = '';
                if (Auth::check()) {
                    $idUser = auth()->user()->id;
                }
                $checkUserDeleteUpdate = Post::where('user_id', $idUser)->where('id', $id)->count();
                foreach ($postDetail as $idCat) {
                    $idCatRelated = $idCat->category_id;
                }
                $relatedPost = Post::with('user')->where('category_id', $idCatRelated)->where('id', '!=', $id)->get();
                return view('frontend.detail', compact('postDetail', 'comments', 'relatedPost', 'checkUserDeleteUpdate', 'postRandom'));
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
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
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
            $listPage = Post::where('category_id', $id)->cursorPaginate(5);
            $nameCat = Category::find($id)->name;
            $category = Category::find($id);
            return view('frontend.listpage', compact('listPage', 'nameCat', 'category'));
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * get: show form write blog
     * post: insert post
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|void
     */
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
                    'user_id' => auth()->user()->id
                ];
                Post::create($dataInsert);
                return redirect()->route('frontend.index');
            }
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * get: show form edit
     * post: edit post
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editBlog(Request $request, $id)
    {
        if ($request->method() == 'GET') {
            $category = Category::all();
            $post = Post::find($id);
            return view('frontend.editBlog', compact('category', 'post'));
        } else {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $dataInsert = [
                'title' => $request->title,
                'content' => $request->contentt,
                'image' => $filename,
                'category_id' => $request->category,
                'user_id' => auth()->user()->id
            ];
            Post::where('id', $id)->update($dataInsert);
            return redirect()->route('frontend.index');
        }
    }

    /**
     * delete blog
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteBlog($id)
    {
        try {
            Post::where('id', $id)->delete();
            return redirect()->route('frontend.index');
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }

    }

    public function error(Request $request)
    {
        $err = $request->get('msg', 'ERROR');
        return view('frontend.error', compact('err'));
    }
}

