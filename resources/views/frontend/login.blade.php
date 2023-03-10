@include('frontend.layout.link')
<html>
<body>
<div class="container-sm  d-flex justify-content-center align-items-center flex-column">
    <h1 class="fw-bold  fs-1 mb-lg-5">Welcome</h1>
    <form class="w-100" id="form-login" method="POST">
        <div class="login">
            <input class="mt-4 fw-bold" type="text" name="username" placeholder="Username"/>
        </div>
        <div class="login">
            <input class="fw-bold" type="text" name="password" placeholder="Password">
        </div>
        <button class="btn-success w-100 border-0 mt-5 p-1 radius-bor-3">Login</button>
        <p class="mt-4 text-center">Do not have an account? <span><a href="#">Sign in</a></span></p>
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
