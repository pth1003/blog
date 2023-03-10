<header class="p-3 bg-dark text-white mb-4">
    <div class="container">
        <div class="d-flex flex-wrap alight-items-center justify-content-center justify-content-lg-start">
            <div class="d-flex justify-content-center align-items-center"><h1 class="m-0 name-blog">Hblog</h1></div>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 mt">
                <li><a href="{{route('frontend.index')}}" class="nav-link px-2 text-white">Home</a></li>
                @foreach(category() as $cat)
                    <li>
                        <a href="{{ route('frontend.page', ['id'=>$cat->id]) }}"
                           class="nav-link px-2 text-white">{{$cat->name}}
                        </a>
                    </li>
                @endforeach()
                @hasanyrole('user|admin|writer')
                <li><a href="{{ route('frontend.write') }}" class="nav-link px-2 text-white">Write blog</a></li>
                @endhasanyrole
            </ul>
            <div class="text-end mt-2">
                @if(isset(Auth::user()->name))
                    <div class="d-flex">
                        <p>Hi: {{ Auth::user()->name }}</p> &nbsp;
                        <p><a class="text-decoration-none text-warning" href="{{ route('backend.logout') }}">Logout</a>
                            <i class="bi bi-box-arrow-right text-warning"></i></p>
                    </div>
                @else
                    <button type="button" class="btn  me-2">
                        <a class="text-decoration-none text-white" href="{{ route('backend.login') }}">
                            Login
                        </a>
                    </button>
                    <button type="button" class="btn btn-success ">
                        <a class="text-decoration-none text-white" href="{{ route('backend.register') }}">
                            Sign-up
                        </a>
                    </button>
                @endif
            </div>
        </div>
    </div>
</header>
