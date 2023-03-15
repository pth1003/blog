@include('frontend.layout.link')
<html>
<body class="body-register">
<div class="container-sm  d-flex justify-content-center align-items-center flex-column">
    <h1 class="fw-bold fs-1">Register Account</h1>
    <form class="w-100" id="form-login" method="POST">
        <fieldset>
            <div class="login">
                <input class="mt-3 fw-bold" type="text" id="fullname" name="fullname" placeholder="Fullname"
                       value="{{old('fullname')}}"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="text" id="username" name="username" placeholder="Username"
                       value="{{old('username')}}"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="password" id="password" name="password" placeholder="Password"
                       value="{{old('password')}}"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="password" id="rePassword" name="rePassword"
                       placeholder="Retype Password"
                       value="{{old('rePassword')}}"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="email" id="email" name="email" placeholder="Email"
                       value="{{old('email')}}"/>
            </div>
            <button type="submit" class="btn-success w-100 border-0 mt-5 p-1 radius-bor-3">Register</button>
        </fieldset>
        @csrf
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(isset($msg))
        <p class="alert-danger p-2 text-danger w-100 text-center fw-bold">{{ $msg }}</p>
    @endif

</div>

<script>
    $('#form-login').validate({
        rules: {
            fullname: "required",
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
            fullname: "Please enter your full name",
            username: "Please enter your username",
            password: "Please enter your password",
            password: "Password has minimum 6 character",
            rePassword: "Please confirm your password",
            rePassword: "2 passwords must be the same",
            email: "Please enter your email",
            email: "Please enter a valid email address",
        }
    })
</script>
</body>
</html>
