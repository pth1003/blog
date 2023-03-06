@extends('backend.layout')
<style>
    .error {
        color:red;
    }
</style>
@section('createUser')
    <p>Dashboard / User</p>
    <div class="d-flex justify-content-center align-items-center flex-column">
        <p><span class="fs-2"><i class="bi bi-plus-circle fs-2 text-success"></i> Create User</span></p>
        <form class="w-75" method="post" id="form-create">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">FullName</label>
                <input type="text" class="form-control" id="fullName" name="fullName">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Retype Password</label>
                <input type="password" class="form-control" id="rePassword" name="rePassword">
            </div>
            <button type="submit" class="btn btn-success w-25">Create <i class="bi bi-send"></i></button>
            <a href="" class="btn w-25 bg-dark text-white text-decoration-none">Back <i
                    class=" bi bi-arrow-return-left"></i></a>
            </button>
            @csrf
        </form>
    </div>
    <script>
        $('#form-create').validate({
            rules: {
                fullName: "required",
                username: "required",
                password: {
                    required: true,
                    minlength: 6
                },
                rePassword: {
                    required: true,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                fullName: "Please enter your full name",
                username: "Please enter your username",
                password: "Please enter your password",
                password: "Password has minimum 6 character",
                rePassword: "Please confirm your password",
                rePassword: "2 passwords must be the same",
                email: "Please enter your email",
                email: "Please enter a valid email address"
            }
        });
    </script>
@endsection
