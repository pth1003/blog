@include('frontend.layout.link')
<style>
    body {
        background-image: linear-gradient(33deg, rgba(58, 140, 71, 0.3), rgba(245, 237, 237, 0.86)), url("https://img.freepik.com/free-vector/watercolor-stains-abstract-background_23-2149107181.jpg?w=2000");
        background-repeat: no-repeat;
        background-position: top center;
        background-size: cover;
    }

    .container-sm {
        margin: 100px auto;
        width: 500px;
    }

    .login {
        width: 100%;
    }

    .login input {
        outline: none;
        padding: 10px 0px;
        border: none;
        border-bottom: 2px solid #ccc;
        width: 100%;
        background-color: transparent;
    }

    .login input:focus {
        border-color: #198754;
    }

    .radius-bor-3 {
        border-radius: 30px
    }

    .error {
        color: red;
        margin-top: 0px;
        font-weight: bold;
        width: 100%;
    }

</style>
<html>
<body>
<div class="container-sm  d-flex justify-content-center align-items-center flex-column">
    <h1 class="fw-bold fs-1">Register Account</h1>
    <form class="w-100" id="form-login" method="POST">
        <fieldset>
            <div class="login">
                <input class="mt-3 fw-bold" type="text" id="fullname" name="fullname" placeholder="Fullname"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="text" id="username" name="username" placeholder="Username"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="password" id="password" name="password" placeholder="Password"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="password" id="rePassword" name="rePassword" placeholder="Retype Password"/>
            </div>
            <div class="login">
                <input class="mt-3 fw-bold" type="email" id="email" name="email" placeholder="Email"/>
            </div>
            <button type="submit" class="btn-success w-100 border-0 mt-5 p-1 radius-bor-3">Register</button>
        </fieldset>
        @csrf
    </form>

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
                required:true,
                minlength:6
            },
            rePassword: {
                required:true,
                equalTo: "#password"
            },
            email: {
                required:true,
                email:true
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
