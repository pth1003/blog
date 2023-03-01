@extends('frontend/layout/layout')
@section('content')
    <div class="content">
        <div class="container">
            <div class="container-content-hot row mt-1 mb-1">
                    <div class="text-light col-lg-8 position-relative p-0">
                        <a href="{{ route('frontend.detail', ['id'=>$newPosts->id]) }}">
                            <img class="w-100 my-img" src="{{asset('/image/'.$newPosts['image'])}}" alt="lỗi"/>
                        </a>
                        <h2 class="position-absolute bottom-0 title-category fw-bold">{{ $newPosts['title'] }}</h2>
                    </div>
                <div class="col-lg-4 p-0">
                    <div class="text-light position-relative">
                        <img class="my-img1 mb" src="{{URL::asset('/image/img.jpg')}}" alt="lỗi"/>
                        <h5 class="position-absolute bottom-0 title-category fw-bold">Tiêu đề của bài viết</h5>
                    </div>
                    <div class="text-light position-relative">
                        <img class="my-img1 mt" src="{{URL::asset('/image/img.jpg')}}" alt="lỗi"/>
                        <h5 class="position-absolute bottom-0 title-category fw-bold">Tiêu đề của bài viết</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content mt-5">
        <div class="container bg-light p-4 border border-ccc">
            <div class="row">
                <div class="col-lg-8 col">
                    <div class="bg-black text-light fw-bold m-2 p-1">Latest News</div>
                    @foreach($posts as $post)
                        <div class="d-flex m-1 position-relative">
                            <div class=" top-50">
                                <img class="m-1" src="{{asset('/image/'.$post->image)}}" alt="Card image cap"
                                     width="280px"
                                     height="190px"/>
                            </div>
                            <div class="m-lg-3">
                                <h5 class="card-title fw-bold">
                                    <a class="text-decoration-none text-black" href="{{ route('frontend.detail', ['id'=>$post->id]) }}">{{ $post->title }}</a>
                                </h5>
                                <div class="bg-danger text-light d-inline-block position-absolute category">
                                    {{ $post->category->name }}
                                </div>
                                <p class="card-text">
                                    <small class="date-time-post">
                                        <span>{{ $post->user->name }}</span>
                                        <span>{{ $dt->toDayDateTimeString() }}</span>
                                        <span>0 Comment</span>
                                    </small>
                                </p>
                                <p class="card-text fs-6">
                                    {{ substr($post->content, 0, 170) }}
                                    <a href="{{ route('frontend.detail', ['id'=>$post->id]) }}">...more</a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4">
                    <div class="bg-black text-light fw-bold m-2 p-1 pdr mr">Suggesst</div>
                    <div class="text-light fw-bold">
                        <div class="d-flex flex-column m-1 position-relative">
                            <div class="img-card">
                                <img class="m-1" src="{{asset('/image/'.$postRandom['image'])}}" alt="Card image cap"
                                     width="100%"
                                     height="240px">
                            </div>
                            <div class="mt mb">
                                <h5 class="card-title fw-bold text-black">{{ $postRandom['title'] }}</h5>
                                <p class="text-black">
                                    <small>
                                        <span>Mr.Hau</span>
                                        <span>03, Aprile, 2023</span>
                                        <span>6 Comment</span>
                                    </small>
                                </p>
                                <p class="card-text fs-6 text-black text-justify">
                                    {{ substr($postRandom['content'], 0, 170) }}
                                </p>
                            </div>
                        </div>
                        <hr class="bg-black">
                        <div class="bg-black text-light fw-bold m-1 p-1 pdr mr">Suggesst</div>
                        <div class="d-flex mb-4 mr-1 ml-4px">
                            <img class="mr-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="120px"
                                 height="100px">
                            <div class="">
                                <p class="card-text text-black fw-bold">Tiêu đề ủa bài viết</p>
                                <p class="card-text text-black">
                                    <small style="font-size: 12px">
                                        <span>Mr.Hau</span>
                                        <span>03, Aprile, 2023</span>
                                        <span>0 Comment</span>
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex mb-4 mr-1 ml-4px">
                            <img class="mr-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="120px"
                                 height="100px">
                            <div class="">
                                <p class="card-text text-black fw-bold">Tiêu đề ủa bài viết</p>
                                <p class="card-text text-black">
                                    <small style="font-size: 12px">
                                        <span>Mr.Hau</span>
                                        <span>03, Aprile, 2023</span>
                                        <span>0 Comment</span>
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex mb-4 mr-1 ml-4px">
                            <img class="mr-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="120px"
                                 height="100px">
                            <div class="">
                                <p class="card-text text-black fw-bold">Tiêu đề ủa bài viết</p>
                                <p class="card-text text-black">
                                    <small style="font-size: 12px">
                                        <span>Mr.Hau</span>
                                        <span>03, Aprile, 2023</span>
                                        <span>0 Comment</span>
                                    </small>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex mb-4 mr-1 ml-4px">
                            <img class="mr-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="120px"
                                 height="100px">
                            <div class="">
                                <p class="card-text text-black fw-bold">Tiêu đề ủa bài viết</p>
                                <p class="card-text text-black">
                                    <small style="font-size: 12px">
                                        <span>Mr.Hau</span>
                                        <span>03, Aprile, 2023</span>
                                        <span>0 Comment</span>
                                    </small>
                                </p>
                            </div>
                        </div>

                        <div class="d-flex mb-4 mr-1 ml-4px">
                            <img class="mr-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="120px"
                                 height="100px">
                            <div class="">
                                <p class="card-text text-black fw-bold">Tiêu đề ủa bài viết</p>
                                <p class="card-text text-black">
                                    <small style="font-size: 12px">
                                        <span>Mr.Hau</span>
                                        <span>03, Aprile, 2023</span>
                                        <span>0 Comment</span>
                                    </small>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

