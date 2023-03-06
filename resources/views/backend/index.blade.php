@extends('backend.layout')
@section('statistical')
    <div class="box-items bg-white p-2 w-25 d-flex justify-content-around align-items-center">
        <i class="bi bi-newspaper fs-1 text-primary"></i>
        <div class="">
            <p class="m-0 p-0 fs-4 fw-bold text-primary">Post</p>
            <p class="m-0 p-0 fs-5">{{ countPost() }}</p>
        </div>
    </div>

    <div class="box-items bg-white p-2 w-25 d-flex justify-content-around align-items-center">
        <i class="bi bi-people fs-1 text-danger"></i>
        <div class="">
            <p class="m-0 p-0 fs-4 fw-bold text-primary">User</p>
            <p class="m-0 p-0 fs-5">{{ countUser() }}</p>
        </div>
    </div>

    <div class="box-items bg-white p-2 w-25 d-flex justify-content-around align-items-center">
        <i class="bi bi-app fs-1 text-success"></i>
        <div class="">
            <p class="m-0 p-0 fs-4 fw-bold text-primary">Category</p>
            <p class="m-0 p-0 fs-5">{{ countCategory() }}</p>
        </div>
    </div>
@endsection
