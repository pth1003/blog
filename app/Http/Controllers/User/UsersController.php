<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{

    /**
     * return list user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listUser()
    {
        try {
            $listUser = User::all();
            return view('backend.users.list', compact('listUser'));
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @param $id get id user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function editUser(Request $request, $id)
    {
        try {
            if ($request->method() == 'GET') {
                $userEdit = User::find($id);
                return view('backend.users.edit', compact('userEdit'));
            } else {
                $dataUpdate = [
                    'name' => $request->fullName,
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ];
                User::where('id', $id)->update($dataUpdate);
                return redirect()->route('backend.listUser');
            }
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * create user
     *
     * checkUsername: check user exits
     * checkEmail: check email exits
     * userId: get user with id
     * nameRole: get role of user
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|int
     */
    public function handleCreateUser(RegisterRequest $request)
    {
        try {
            $user = User::where('username', $request->username)->orWhere('email', $request->email)->first();
            if ($user != null) {
                return view('backend.users.create')->with('msg', 'Username or email already exists');
            }
            $dataInsert = [
                'name' => $request->fullName,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'isAd' => $request->selectRole != 'user' ? 1 : 0
            ];

            $user = User::create($dataInsert);

            $userId = User::find($user->id);
            $nameRole = $request->selectRole;
            $userId->assignRole($nameRole);
            return redirect()->route('backend.listUser');
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * return form create user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function createUser()
    {
        try {
            $roles = Role::where('name', '!=', 'admin')->get();
            return view('backend.users.create', compact('roles'));
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * get id delete user
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        try {
            User::where('id', $id)->delete();
            return redirect()->route('backend.listUser');
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

}
