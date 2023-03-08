<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Comment;
use App\Models\ModelHasPermissions;
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
use Spatie\Permission\Traits\HasRoles;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $checkLogin = Auth::check();
        if (!$checkLogin) {
            return redirect()->route('backend.login');
        }
//        dd(auth()->user()->getPermissionsViaRoles());
        return view('backend.index');
    }

    /**
     * get list comment
     * @param $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function comment($status)
    {
        $countCmtPending = Comment::where('status', 0)->count();
        $countCmtSolved = Comment::where('status', 1)->count();
        $comments = Comment::with('user')->where('status', $status)->simplePaginate(10);
        $idStatus = 0;
        foreach ($comments as $status) {
            $idStatus = $status->status;
        }
        return view('backend.comment', compact('comments', 'idStatus', 'countCmtPending', 'countCmtSolved'));
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
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|int
     */
    public function handleCreateUser(Request $request)
    {
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
        $user = User::create($dataInsert);
//        $userId = User::find($user->id);
//        $nameRole = $request->selectRole;
//        $userId->assignRole($nameRole);

        $userId = $user->id;
//        $nameRole = $request->selectRole;
        $userId->assignRole('writer');
        return redirect()->route('backend.listUser');
    }

    /**
     * return form create user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createUser()
    {
//        $roles = Role::where('name', '!=', 'admin')->get();
        return view('backend.users.create');
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
            $user = User::create($dataInsert);
            $user = User::find($user->id);
            $user->assignRole('user');
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
            if (auth()->user()->isAdmin == 1) {
                return redirect()->route('backend.index');
            }
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
        return redirect()->route('frontend.index');
    }

    /**
     * nameUser: get name user current
     * allPermissions: get all permissions
     * permissionsUser: get User have role as: admin, write, editor
     * roles: get all role except id = 2 (admin)
     * idRole: get id_role
     * role: provider and revoke permission
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editPermission(Request $request, $id)
    {
        if ($request->method() == 'GET') {
            $nameUser = User::find($id)->name;
            $allPermissions = Permission::all();
            $permissionsUser = User::with('permissions', 'roles')->where('id', $id)->get();
            $roles = Role::where('id', '!=', 2)->get();
            return view('backend.permission.permissionEdit', compact('permissionsUser', 'roles', 'nameUser', 'allPermissions'));
        } else {
            $idRole = $request->role;
            $role = Role::find($idRole);
            $role->syncPermissions([$request->permission]);
            return redirect()->route('backend.permission.list');
        }
    }

    public function permissionList()
    {
        $roleWithPermission = Role::with('users', 'permissions')->get();
        $userWithRole = User::with('roles')->get();
//        $userRole = [];
        return view('backend.permission.permissionList', compact('roleWithPermission', 'userWithRole'));
    }


    public function addRole(Request $request)
    {
        if($request->method() == 'GET') {
            return view('backend.permission.addRole');
        } else {
            Role::create(['name' => $request->nameRole]);
            return redirect()->route('backend.permission.list');
        }
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
        return view('backend.post.posts', compact('posts', 'category', 'nameCategory'));
    }


    public function editPost(Request $request, $id)
    {
        if($request->method() == 'GET'){
            $post = Post::find($id);
            $idCat = Post::find($id)->category_id;
            $categoty = Category::all();
            return view('backend.post.edit', compact('post', 'categoty', 'idCat'));
        }else {

//           return view('backend.post.edit', compact('post'));
        }
    }

    public function addPost(Request $request)
    {
        if($request->method() == "GET"){
            $categoty = Category::all();
            return view('backend.post.add', compact('categoty'));
        }else {
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
            return redirect()->route('backend.post.list', ['id'=>'all']);
        }
    }

    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('backend.post.list', ['id'=>'all']);
    }
}
