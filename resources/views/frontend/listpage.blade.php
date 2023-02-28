@include('frontend.layout.link')
@include('frontend.layout.header')
<div class="content-page container">
    <p>Home / <span class="fw-bold">Sport</span></p>
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex position-relative responsive-post">
                <div class="img-card">
                    <img class="m-1" src="{{URL::asset('/image/img2.jpg')}}" alt="Card image cap" width="350px"
                         height="250px">
                </div>
                <div class="m-3">
                    <h5 class="card-title fs-4 fw-bold">Tiêu đề của bài viết ở đây</h5>
                    <div class="bg-danger text-light d-inline-block position-absolute category">Sport</div>
                    <p class="card-text">
                        <small>
                            <span>Mr.Hau</span>
                            <span>03, Aprile, 2023</span>
                            <span>6 Comment</span>
                        </small>
                    </p>
                    <p class="card-text fs-6">This is a wider card with supporting text below as a natural
                        lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="d-flex position-relative">
                <div class="img-card">
                    <img class="m-1" src="{{URL::asset('/image/img2.jpg')}}" alt="Card image cap" width="350px"
                         height="250px">
                </div>
                <div class="m-3">
                    <h5 class="card-title fs-4 fw-bold">Tiêu đề của bài viết ở đây</h5>
                    <div class="bg-danger text-light d-inline-block position-absolute category">Sport</div>
                    <p class="card-text">
                        <small>
                            <span>Mr.Hau</span>
                            <span>03, Aprile, 2023</span>
                            <span>6 Comment</span>
                        </small>
                    </p>
                    <p class="card-text fs-6">This is a wider card with supporting text below as a natural
                        lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>

            <div class="d-flex position-relative">
                <div class="img-card">
                    <img class="m-1" src="{{URL::asset('/image/img2.jpg')}}" alt="Card image cap" width="350px"
                         height="250px">
                </div>
                <div class="m-3">
                    <h5 class="card-title fs-4 fw-bold">Tiêu đề của bài viết ở đây</h5>
                    <div class="bg-danger text-light d-inline-block position-absolute category">Sport</div>
                    <p class="card-text">
                        <small>
                            <span>Mr.Hau</span>
                            <span>03, Aprile, 2023</span>
                            <span>6 Comment</span>
                        </small>
                    </p>
                    <p class="card-text fs-6">This is a wider card with supporting text below as a natural
                        lead-in to additional content. This content is a little bit longer.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="pagination container d-flex justify-content-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>
@include('frontend.layout.footer')
