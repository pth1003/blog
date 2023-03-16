@extends('backend.layout')
@section('permissionList')
    <p>Dash board / Permission</p>
    <div class="d-flex align-items-center">
        <h3 class="m-0">Roles and Permissions</h3>
        <a style="margin-left: 10px" class="btn btn-success" href="{{ route('backend.role.add') }}">Add Role</a>
    </div>
    <table class="table fs-13px">
        <thead>
        <tr>
            <th>Role</th>
            <th class="w-50">Permission</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roleWithPermission as $key=>$role)
            <tr>
                <td>{{ ucfirst($role->name) }}</td>
                <td>
                    @foreach($role->permissions as $per)
                        {{ucfirst($per->name) }},
                    @endforeach
                </td>
                <td>
                    @if($role->name != 'admin')
                        <a class="" href="{{ route('backend.permission.edit', ['id'=>$role->id]) }}"><i
                                class="bi bi-pencil text-success"></i></a>&nbsp;&nbsp;&nbsp;
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h3 class="mt-5">User</h3>
    <table class="table fs-13px">
        <thead>
        <tr>
            <th>Fullname</th>
            <th>Username</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($userWithRole as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>
                    @foreach($user->roles as $userRole)
                            {{ucfirst($userRole->name)}}
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
