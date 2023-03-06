<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

//use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
use Hash;
use Auth;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.index');
    }

    /**
     * get list comment
     * @param $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function comment($status)
    {
        $comments = Comment::with('user')->where('status', $status)->simplePaginate(8);
        $idStatus = 0;
        foreach ($comments as $status) {
            $idStatus = $status->status;
        }
        return view('backend.comment', compact('comments', 'idStatus'));
    }

    /**
     * handle comment delete and update
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleComment($id)
    {
        $url = substr(url()->current(), -3);
        if ($url == 'del') {
            Comment::find($id)->delete();
            return redirect()->route('backend.comment.list', ['status' => 1]);
        } else {
            Comment::where('id', $id)->update(['status' => 1]);
            return redirect()->route('backend.comment.list', ['status' => 1]);
        }
    }

    /**
     * update status all comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmAllComment()
    {
        $comment = Comment::all();
        foreach ($comment as $status) {
            Comment::where('id', $status->id)->update(['status' => 1]);
        }
        return redirect()->route('backend.comment.list', ['status' => 1]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postManagement($id)
    {
        $category = Category::all();
        $nameCategory = 'All';
        if ($id == 'all') {
            $posts = Post::with('user', 'category')->get();
        } else {
            $nameCategory = Category::find($id)->name;
            $posts = Post::with('user', 'category')->where('category_id', $id)->get();
        }
        return view('backend.posts', compact('posts', 'category', 'nameCategory'));
    }


    /**
     * method GET: return view Form Register
     * method POST: return handle Register
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function handleRegister(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('frontend.register');
        } else {
            $dataInsert = [
                'name' => $request->fullname,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
            ];
            User::create($dataInsert);
            return redirect()->route('frontend.index');
        }
    }

    /**
     * method GET: return view Form Login
     * method POST: return handle Login
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|string
     */
    public function handleLogin(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('frontend.login');
        } else {
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:6'
            ],
            [
                'username.required'=>'Please enter your username',
                'password.required'=>'Please enter your password',
                'password.min'=>'Password has minimum 6 character'
            ]);

            $dataLogin = $request->only('username', 'password');
            $login = Auth::attempt($dataLogin);
            if ($login) {
                return redirect()->route('frontend.index');
            }
            return view('frontend.login')->with(['msg'=>'Error']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('frontend.index');
    }
}
