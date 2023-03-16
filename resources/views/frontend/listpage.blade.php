@extends('frontend.layout.layout')
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

        span svg {
            display: block !important;
            height: 40px !important;
            width: 40px !important;
        }

        .breadcrumb-item a {
            text-decoration: none !important;
            color: #000000;
        }
    }
</style>
@section('content')
    <div class="content-page container">
        {{ Breadcrumbs::render('cat', $category) }}
        <div class="row">
            <div class="col-md-12">
                @foreach($listPage as $page)
                    <div class="d-flex position-relative responsive-post">
                        @section('title')
                            {{$page->category->name}}
                        @endsection
                        <div class="img-card">
                            <a href="{{ route('frontend.detail', ['id'=>$page->id]) }}">
                                <img class="m-1 img-page" src="{{asset('/image/'.$page->image)}}" alt="Card image cap">
                            </a>
                        </div>
                        <div class="m-3">
                            <h5 class="card-title fs-4 fw-bold">
                                <a class="text-decoration-none text-black"
                                   href="{{ route('frontend.detail', ['id'=>$page->id]) }}">{{ $page->title }}
                                </a>
                            </h5>
                            <div class="bg-danger text-light d-inline-block position-absolute category">
                                {{ $page->category->name }}
                            </div>
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
    <ul class="pagination d-flex justify-content-center">
        {!! $listPage->links() !!}
    </ul>
@endsection
