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
    <div class="row">
        <h4 class="m-0">All permission of role <span class="fw-bold">{{ucfirst($role->name)}}</span></h4>
        <form method="POST">
            <div class="d-flex justify-content-around">
                @foreach($groupPermission as $group)
                    <div class=" col-lg-2 col-md-3 align-items-center justify-content-between w-10 bg-white m-0 mt-2">
                        <p class="m-0 p-3 fw-bold">{{ ucfirst($group->name) }}</p>
                        <div class="">
                            @foreach($group->permissions as $permision)
                                <div class="d-flex justify-content-between p-3">
                                    <p class="m-0">{{ ucfirst($permision->name) }}</p>
                                    <input type="checkbox"
                                           value="{{ $permision->id }}"
                                           name="permission[]"
                                           @if (isset($permisions[$permision->id])) checked @endif
                                    />
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="btn btn-success mt-3">Submit</button>
            @csrf
        </form>
    </div>
@endsection
