@extends('backend.layout')
@section('permission')
    <style>
        input[type='checkbox'] {
            width: 20px;
        }

        .w-10 {
            width: 15%;
            margin-left: 10px;
            margin-bottom: 5px;
        }
    </style>
    <p>Dashboard / Permission</p>
    <h3>Permission List</h3>
    <div class="row">
        <form method="POST">
            @foreach($permissions as $permission)
                <div class="d-flex col-lg-2 col-md-3 align-items-center justify-content-between w-10 bg-white m-0 mt-2">
                    <p class="m-0">{{ ucfirst($permission->name) }}</p>
                    <input type="checkbox" value="{{ $permission->id }}" name="permission[]"/>
                </div>
            @endforeach

            <select class="mt-4" name="role">
                <option value="admin">Admin</option>
                <option value="editor">Editor</option>
            </select>
                <button class="btn btn-success">Submit</button>
            @csrf
        </form>
    </div>
@endsection
