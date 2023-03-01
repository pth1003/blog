<header class="p-3 bg-dark text-white mb-4">
    <div class="container">
        <div class="d-flex flex-wrap alight-items-center justify-content-center justify-content-lg-start">
            <div class="d-flex justify-content-center align-items-center"><h1 class="m-0 name-blog">Hblog</h1></div>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 mt">
                <li><a href="{{route('frontend.index')}}" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="{{ route('frontend.page', ['id'=>1]) }}" class="nav-link px-2 text-white">Sport</a></li>
                <li><a href="{{ route('frontend.page', ['id'=>2]) }}" class="nav-link px-2 text-white">Art</a></li>
                <li><a href="{{ route('frontend.page', ['id'=>3]) }}" class="nav-link px-2 text-white">Heath</a></li>
                <li><a href="{{ route('frontend.page', ['id'=>4]) }}" class="nav-link px-2 text-white">Entertainment</a></li>
                <li><a href="{{ route('frontend.page', ['id'=>5]) }}" class="nav-link px-2 text-white">Science</a></li>
                <li><a href="{{ route('frontend.write') }}" class="nav-link px-2 text-white">Write blog</a></li>
            </ul>
            <div class="text-end mt">
                <button type="button" class="btn  me-2"><a class="text-decoration-none text-white" href="{{ route('frontend.login') }}">Login</a></button>
                <button type="button" class="btn btn-success "><a class="text-decoration-none text-white" href="{{ route('frontend.register') }}">Sign-up</a></button>
            </div>
        </div>
    </div>
</header>
