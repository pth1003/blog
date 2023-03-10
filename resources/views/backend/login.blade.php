@include('frontend.layout.link')
<link rel="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"/>
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
    <h1 class="fw-bold  fs-1 mb-lg-5">Login System</h1>
    <form class="w-100" id="form-login" method="POST">
        <div class="login">
            <input class="mt-4 fw-bold" type="text" name="username" placeholder="Username"/>
        </div>
        <div class="login">
            <input class="fw-bold" type="password" name="password" placeholder="Password">
        </div>
        <button class="btn-success w-100 border-0 mt-5 p-1 radius-bor-3">Login</button>
        <p class="mt-4 text-center">Do not have an account? <span><a href="#">Sign in</a></span></p>
        @csrf
    </form>
    @if(isset($msg))
        <p class="alert-danger p-2 text-danger w-100 text-center fw-bold">{{ $msg }}</p>
    @endif
</div>
<script>
    $('#form-login').validate({
        rules: {
            username: "required",
            password: "required"
        },

        messages: {
            username: "Please enter your username",
            password: "Please enter your password",
        }
    })
</script>
</body>
</html>
