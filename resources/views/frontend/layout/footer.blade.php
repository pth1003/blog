<div class="container-fluid bg-dark mt-5">
    <div class="container">
        <footer class="py-5">
            <div class="row">
                <div class="col-6 col-md-4 mb-3">
                    <h5 class="text-light">About the website</h5>
                    <p class="text-white text-justify">
                        Đến với website HBLOG bạn có thể thỏa sức viết những bài blog đa dạng với nhiều chủ đề khác
                        nhau.
                    </p>
                </div>

                <div class="col-6 col-md-4 mb-3 d-flex flex-column justify-content-center align-items-center">
                    <h5 class="text-light m-0">Menu</h5>
                    <ul class="nav flex-column">
                        @foreach(category() as $cat)
                            <li class="nav-item mb-2">
                                <a href="{{ route('frontend.page', ['id'=>$cat->id]) }}"
                                   class="nav-link p-0 text-light text-center">{{$cat->name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-6 col-md-4 mb-3 d-flex flex-column justify-content-center align-items-center">
                    <h5 class="text-light mbt-4">Contact us</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item mb-2">
                            <a href="https://mail.google.com" class="nav-link p-0 text-light">
                                <div class="d-flex justify-content-between">
                                    <span> Email </span>
                                    <i class="bi bi-envelope"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="https://facebook.com" class="nav-link p-0 text-light">
                                <div class="d-flex justify-content-between">
                                    <span> Facebook </span>
                                    <i class="bi bi-facebook"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="https://instagram.com" class="nav-link p-0 text-light">
                                <div class="d-flex justify-content-between">
                                    <span> Instagram </span>
                                    <i class="bi bi-instagram"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item mb-2">
                            <a href="https://telegram.com" class="nav-link p-0 text-light">
                                <div class="d-flex justify-content-between">
                                    <span> Telegram </span>
                                    <i class="bi bi-telegram"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
