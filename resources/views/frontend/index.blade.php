@extends('frontend/layout/layout')
@section('content')
    <div class="content">
        <div class="container">
            <div class="container-content-hot row mt-1 mb-1">
                <div class="text-light col-lg-8 position-relative p-0">
                    <img class="w-100 my-img" src="{{URL::asset('/image/img.jpg')}}" alt="lỗi"/>
                    <h2 class="position-absolute bottom-0 title-category fw-bold">Tiêu đề của bài viết</h2>
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
                    <div class="d-flex m-1 position-relative">
                        <div class="img-card">
                            <img class="m-1" src="{{URL::asset('/image/img2.jpg')}}" alt="Card image cap" width="280px"
                                 height="190px">
                        </div>
                        <div class="m-lg-3">
                            <h5 class="card-title fw-bold">Tiêu đề của bài viết ở đây</h5>
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

                    <div class="d-flex m-1 position-relative">
                        <div class="img-card">
                            <img class="m-1" src="{{URL::asset('/image/img4.jpg')}}" alt="Card image cap" width="280px"
                                 height="190px">
                        </div>
                        <div class="m-lg-3">
                            <h5 class="card-title fw-bold">Tiêu đề của bài viết ở đây</h5>
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

                    <div class="d-flex m-1 position-relative">
                        <div class="img-card">
                            <img class="m-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="280px"
                                 height="190px">
                        </div>
                        <div class="m-lg-3">
                            <h5 class="card-title fw-bold">Tiêu đề của bài viết ở đây</h5>
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
                    <div class="d-flex m-1 position-relative">
                        <div class="img-card">
                            <img class="m-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="280px"
                                 height="190px">
                        </div>
                        <div class="m-lg-3">
                            <h5 class="card-title fw-bold">Tiêu đề của bài viết ở đây</h5>
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
                    <div class="d-flex m-1 position-relative">
                        <div class="img-card">
                            <img class="m-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap" width="280px"
                                 height="190px">
                        </div>
                        <div class="m-lg-3">
                            <h5 class="card-title fw-bold">Tiêu đề của bài viết ở đây</h5>
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

                <div class="col-lg-4">
                    <div class="bg-black text-light fw-bold m-2 p-1 pdr mr">Suggesst</div>
                    <div class="text-light fw-bold">
                        <div class="d-flex flex-column m-1 position-relative">
                            <div class="img-card">
                                <img class="m-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap"
                                     width="100%"
                                     height="180px">
                            </div>
                            <div class="mt mb">
                                <h5 class="card-title fw-bold text-black">Tiêu đề của bài viết ở đây</h5>
                                {{--                                <div class="bg-danger text-light d-inline-block position-absolute category">Sport</div>--}}
                                <p class="text-black">
                                    <small>
                                        <span>Mr.Hau</span>
                                        <span>03, Aprile, 2023</span>
                                        <span>6 Comment</span>
                                    </small>
                                </p>
                                <p class="card-text fs-6 text-black text-justify">This is a wider card with supporting
                                    text below as a natural
                                    lead-in to additional content. This content is a little bit longer.</p>
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

