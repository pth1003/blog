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
use Hash;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
        $comments = Comment::with('user')->where('status', $status)->simplePaginate(10);
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
            return redirect()->route('backend.comment.list', ['status' => 0]);
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
     * return list post
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
     * return list user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listUser()
    {
        $listUser = User::all();
        return view('backend.users.list', compact('listUser'));
    }

    /**
     * @param Request $request
     * @param $id get id user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editUser(Request $request, $id)
    {
        if ($request->method() == 'GET') {
            $userEdit = User::find($id);
            return view('backend.users.edit', compact('userEdit'));
        } else {
            $dataUpdate = [
                'name' => $request->fullName,
                'username' => $request->username,
                'email' => $request->email
            ];
            User::where('id', $id)->update($dataUpdate);
            return redirect()->route('backend.listUser');
        }
    }

    /**
     * Create user
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|int
     */
    public function createUser(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('backend.users.create');
        } else {
            $checkUsername = User::where('username', $request->username)->first();
            $checkEmail = User::where('email', $request->email)->first();
            if ($checkUsername != null || $checkEmail != null) {
                return view('backend.users.create')->with('msg', 'Username or email already exists');
            }
            $dataInsert = [
                'name' => $request->fullName,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
            ];
            User::create($dataInsert);
            return redirect()->route('backend.listUserk');
        }
    }

    /**
     * checkUser: check user exits
     * dataInsert: insert user into database
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
            $checkUsername = User::where('username', $request->username)->first();
            $checkEmail = User::where('email', $request->email)->first();
            if ($checkUsername != null || $checkEmail != null) {
                return view('frontend.register')->with('msg', 'Username or email already exists');
            }
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
     * method POST: return handle Login
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|string
     */
    public function handleLogin(Request $request)
    {
        $dataLogin = $request->only('username', 'password');
        $login = Auth::attempt($dataLogin);
        if ($login) {
            return redirect()->route('frontend.index');
        }
        return view('frontend.login')->with('msg', 'Username or password is incorrect');
    }

    /**
     * return view form login
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function formLogin()
    {
        return view('frontend.login');
    }

    /**
     * Logout
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('frontend.index');
    }

    public function createRolePermission()
    {
//        $roleWrite = Role::create(['name' => 'writer']);
//        $roleAdmin = Role::create(['name' => 'admin']);
//          Permission::create(['name' => 'delete post']);
//          Permission::create(['name' => 'create user']);
//          Permission::create(['name' => 'edit user']);
//          Permission::create(['name' => 'delete user']);
//          Permission::create(['name' => 'create category']);
//          Permission::create(['name' => 'edit category']);
//          Permission::create(['name' => 'delete category']);
            $user = User::find(9);
            $user->givePermissionTo('create category');
    }
}
