@extends('backend.layout')
@section('editUser')
    <div class="d-flex justify-content-center align-items-center flex-column">
        <p><i class="bi bi-pencil-fill fs-2 text-warning"></i> <span class="fs-2">Edit User</span></p>
        <form class="w-75" method="post" id="form-update">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label fw-bold">FullName</label>
                <input type="text" class="form-control" id="fullName" name="fullName" value="{{ $userEdit['name'] }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ $userEdit['username'] }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $userEdit['email'] }}">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Password</label>
                <input type="password" class="form-control" id="email" name="password" value="{{ $userEdit['password'] }}">
            </div>
            <button type="submit" class="btn btn-success w-25">Submit <i class="bi bi-send"></i></button>
            <a href="{{ route('backend.listUser') }}" class="btn w-25 bg-dark text-white text-decoration-none">Back<i class=" bi bi-arrow-return-left"></i></a>
            </button>
            @csrf
        </form>
    </div>

    <script>

        $('#form-update').validate({
            rules: {
                fullname: "required",
                username: "required",
                password: {
                    required: true,
                    minlength: 6
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                fullname: "Please enter your full name",
                username: "Please enter your username",
                password: "Please enter your password",
                password: "Password has minimum 6 character",
                email: "Please enter your email",
                email: "Please enter a valid email address"
            }
        });
    </script>
    </script>
@endsection
