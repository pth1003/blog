@extends('frontend/layout/layout')
@section('content')
    <div class="content">
        <div class="container">
            <h1>
            </h1>
            <div class="container-content-hot row mt-1 mb-1">
                <div class="text-light col-lg-8 position-relative p-0">
                    <a href="{{ route('frontend.detail', ['id'=>$newPosts->id]) }}">
                        <img class="w-100 my-img" src="{{asset('/image/'.$newPosts['image'])}}" alt="lỗi"/>
                    </a>
                    <h2 class="position-absolute bottom-0 title-category fw-bold">{{ $newPosts['title'] }}</h2>
                </div>
                <div class="col-lg-4 p-0">
                    <div class="text-light position-relative">
                        <a class="text-white" href="{{route('frontend.detail', ['id'=>$postRandom1->id])}}">
                            <img class="my-img1 mb" src="{{asset('/image/'.$postRandom1['image'])}}" alt="lỗi"/>
                            <h5 class="position-absolute bottom-0 title-category fw-bold">{{$postRandom1['title']}}</h5>
                        </a>
                    </div>
                    <div class="text-light position-relative">
                        <a class="text-white" href="{{route('frontend.detail', ['id'=>$postRandom2->id])}}">
                            <img class="my-img1 mt" src="{{asset('/image/'.$postRandom2['image'])}}" alt="lỗi"/>
                            <h5 class="position-absolute bottom-0 title-category fw-bold">{{$postRandom2['title']}}</h5>
                        </a>
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
                                <a href="{{ route('frontend.detail', ['id'=>$post->id]) }}">
                                    <img class="m-1" src="{{asset('/image/'.$post->image)}}" alt="Card image cap"
                                         width="280px" height="190px"/>
                                </a>
                            </div>
                            <div class="m-lg-3">
                                <h5 class="card-title fw-bold">
                                    <a class="text-decoration-none text-black"
                                       href="{{ route('frontend.detail', ['id'=>$post->id]) }}">{{ $post->title }}</a>
                                </h5>
                                <div class="bg-danger text-light d-inline-block position-absolute category">
                                    {{ $post->category->name }}
                                </div>
                                <p class="card-text">
                                    <small class="date-time-post d-flex">
                                        <span class="d-flex align-items-center mr-1"><i class="bi bi-person-fill"></i>&nbsp;{{ $post->user->name }}</span>
                                        <span class="d-flex align-items-center mr-1"><i
                                                class="bi bi-alarm-fill mbt-2"></i>&nbsp;{{ $post->created_at-> toDayDateTimeString() }}</span>
                                        <span class="d-flex align-items-center"><i class="bi bi-chat-dots-fill"></i>&nbsp;0</span>
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
                                    </small>
                                </p>
                                <p class="card-text fs-6 text-black text-justify">
                                    {{ substr($postRandom['content'], 0, 170) }}
                                </p>
                            </div>
                        </div>
                        <hr class="bg-black">
                        <div class="bg-black text-light fw-bold m-1 p-1 pdr mr">{{ $catNameRandom }}</div>
                        @foreach($catRandom as $post)
                            <div class="d-flex mb-4 mr-1 ml-4px">
                                <a href="{{ route('frontend.detail', ['id'=>$post->id]) }}">
                                    <img class="mr-1" src="{{asset('/image/'.$post->image)}}" alt="Card image cap"
                                         width="120px"
                                         height="100px">
                                </a>
                                <div class="">
                                    <p class="card-text text-black fw-bold m-0"><a
                                            class="text-decoration-none text-black fs-13px"
                                            href="{{ route('frontend.detail', ['id'=>$post->id]) }}">{{ $post->title }}</a>
                                    </p>
                                    <p class="card-text text-black">
                                        <small style="font-size: 10px">
                                            <span>{{ $post->user->name}}</span>
                                            <span>{{ $post->created_at-> toDayDateTimeString() }}</span>
                                        </small>
                                    </p>
                                </div>
                            </div>
                    </div>
                    @endforeach
                </div>
                <style>
                    .pagination svg {
                        width: 20px;
                    }
                </style>
                <div class="pagination">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

