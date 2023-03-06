@extends('backend.layout')
@section('user')
    <p>Dashboard / User</p>
    <div class="d-flex align-items-center justify-content-between">
        <h5 class="fw-bold m-0"><i class="bi bi-people fs-2 text-success"></i> Users list</h5>
        <a href="{{ route('backend.createUser') }}" class="btn btn-success text-decoration-none "><i class="bi bi-plus-lg"></i> New User</a>
    </div>
    <div class="posts container-fluid bg-white mt-1">
        <table class="table fs-13px">
            <thead>
            <tr>
                <th>Id</th>
                <th>FullName</th>
                <th>Username</th>
                <th>Email</th>
                <th>created_at</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listUser as $key => $user)
                <tr>
                    <th>{{++$key}}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->toDayDateTimeString() }}</td>
                    <td>
                        <a class="" href="{{ route('backend.editUser', ['id'=>$user->id]) }}"><i class="bi bi-pencil text-success"></i></a>&nbsp;&nbsp;&nbsp;
                        <a class="" href=""> <i class="bi bi-trash2 text-danger"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
