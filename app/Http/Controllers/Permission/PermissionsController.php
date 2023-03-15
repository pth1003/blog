<?php

namespace App\Http\Controllers\Permission;
use App\Http\Controllers\Controller;
use App\Models\GroupPermission;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
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
            $groupPermission = GroupPermission::with('permissions')->get();
            $idRole = $id;
            $role = Role::find($id);

            $permisions = [];
            foreach ($role->permissions()->get() as $permision) {
                $permisions[$permision->id] = $permision;
            }

            return view('backend.permission.permissionEdit', compact('idRole', 'groupPermission', 'role', 'permisions'));
        } else {
            $role = Role::find($id);
            $role->syncPermissions([$request->permission]);
            return redirect()->route('backend.permission.list');
        }
    }

    /**
     * roleWithPermission: get permission of role
     * userWithRole: get role of user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function permissionList()
    {
        $roleWithPermission = Role::with('users', 'permissions')->get();
        $userWithRole = User::with('roles')->get();
        return view('backend.permission.permissionList', compact('roleWithPermission', 'userWithRole'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function addRole(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('backend.permission.addRole');
        } else {
            Role::create(['name' => $request->nameRole]);
            return redirect()->route('backend.permission.list');
        }
    }
}
