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

</style>
<html>
<body>
<div class="container-sm  d-flex justify-content-center align-items-center flex-column">
    <h1 class="fw-bold  fs-1 mb-lg-5">Register Account</h1>
    <form class="w-100" id="form-login">
        <div class="login">
            <input class="mb-3 fw-bold" type="text" id="fullname" placeholder="Fullname"/>
        </div>
        <div class="login">
            <input class="mb-3 fw-bold" type="text" id="username" placeholder="Username"/>
        </div>
        <div class="login">
            <input class="mb-3 fw-bold" type="text" id="password" placeholder="Password"/>
        </div>
        <div class="login">
            <input class="mb-3 fw-bold" type="text" id="rePassword" placeholder="Retype Password"/>
        </div>
        <div class="login">
            <input class="fw-bold" type="text" id="email" placeholder="Email"/>
        </div>
        <button type="submit" class="btn-success w-100 border-0 mt-5 p-1 radius-bor-3">Register</button>
        @csrf
    </form>
</div>
</body>
<script>
    $('form-login').validate({
        rules: {
            fullname: "required",
            username: "required",
            password: "required",
            rePassword: "required",
            email: "required",
        },

        messages: {
            fullname: "Please enter your full name",
            username: "Please enter your username",
            password: "Please enter your password",
            rePassword: "Please confirm your password",
            email: "Please enter your email",
        }
    })
</script>
</html>
