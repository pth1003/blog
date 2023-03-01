@include('frontend.layout.link')
@include('frontend.layout.header')
<style>

    .img-card .img-page {
        width: 350px;
        height: 250px;
    }

    @media (max-width: 739px) {
        .responsive-post {
            display: block !important;
        }

        .img-card .img-page {
            width: 100%;
        }

        .category {
            display: none !important;
        }
    }
</style>
<div class="content-page container">
    <p>Home / <span class="fw-bold">{{ $nameCat }}</span></p>
    <div class="row">
        <div class="col-md-12">
            @foreach($listPage as $page)
                <div class="d-flex position-relative responsive-post">
                    <div class="img-card">
                        <img class="m-1 img-page" src="{{asset('/image/'.$page->image)}}" alt="Card image cap">
                    </div>
                    <div class="m-3">
                        <h5 class="card-title fs-4 fw-bold">{{ $page->title }}</h5>
                        <div class="bg-danger text-light d-inline-block position-absolute category">{{ $page->category->name }}</div>
                        <p class="card-text">
                            <small>
                                <span>{{ $page->user->name }}</span>
                                <span>03, Aprile, 2023</span>
                                <span>6 Comment</span>
                            </small>
                        </p>
                        <p class="card-text fs-6">
                            {{ $page->title }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>

<div class="pagination container d-flex justify-content-center mt-5">
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
