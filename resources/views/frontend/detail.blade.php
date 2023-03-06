@extends('frontend.layout.layout')
<!-- ==== Detail ==== -->
@section('content')
    <div class="detail-post container bg-white">
        <div class="row">
            <div class="col-lg-8">
                <!--=== Post Detail ===-->
                @foreach($postDetail as $post)
                    <div>
                        <img class="img-detail" src="{{ asset('/image/'.$post->image) }}">
                    </div>
                    <div class="bg-danger text-light d-inline-block category-detail">{{ $post->category->name }}</div>
                    <h5 class="card-title fw-bold title-post-detail">{{ $post->title }}</h5>
                    <p class="card-text">
                        <small>
                            <span>{{ $post->user->name }}</span>
                            <span>03, Aprile, 2023</span>
                        </small>
                    </p>
                    <p class="card-text fs-6 text-justify">
                        {{ $post->content }}
                    </p>
                @endforeach
                <!--=== End Post Detail ===-->

                <!--=== Comment  === -->
                <div class="comment-post p-2">
                    <p class="fw-bold"><i class="bi bi-chat-fill"></i> Comment ({{ $comments->count() }})</p>
                    <form method="POST" id="form-comment">
                        @if(isset(Auth::user()->name))
                            <div class="d-flex">
                                <input type="text" class="w-100 p-1 input-comment" name="contentt"
                                       placeholder="Write comment ..."/>
                                <button class="btn btn-sm btn-success" type="submit">Send</button>
                                @csrf
                            </div>
                        @endif
                    </form>
                    @foreach($comments as $comment)
                        <div class="user-comment mt">
                            <div style="font-size: 14px" class="d-flex fw-bold">
                                <p class="m-0 fs-13px">{{ $comment->user->name }} - </p>&nbsp;
                                <p class="m-0">{{ $comment->created_at->toDayDateTimeString() }} </p>
                            </div>
                            <p class="bg-white p-1" style="font-size: 14px">{{ $comment->content }}</p>
                        </div>
                    @endforeach
                </div>
                <!-- ===End Comment === -->
            </div>

            <div class="col-lg-4">
                <div class="bg-black text-light fw-bold m-2 p-1 pdr mr">Suggest</div>
                <div class="text-light fw-bold">
                    <!--=== Post Suggest===-->
                    <div class="d-flex flex-column m-1 position-relative">
                        <div class="img-card">
                            <img class="m-1" src="{{URL::asset('/image/img3.jpg')}}" alt="Card image cap"
                                 width="100%"
                                 height="180px">
                        </div>
                        <div class="mt mb">
                            <h5 class="card-title fw-bold text-black">Tiêu đề của bài viết ở đây</h5>
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
                    <!--===End Post Suggest===-->

                    <!-- == Related Posts == -->
                    <hr class="bg-black">
                    <div class="bg-black text-light fw-bold m-1 p-1 pdr mr">
                        Related Posts
                    </div>
                    @foreach($relatedPost as $post)
                        <div class="d-flex mb-4 mr-1 ml-4px">
                            <img class="mr-1" src="{{URL::asset('/image/'.$post->image)}}" alt="Card image cap"
                                 width="120px"
                                 height="100px">
                            <div>
                                <p class="card-text text-black fw-bold m-0">
                                    <a class="text-decoration-none text-black fs-13px" href="">{{ $post->title }}</a>
                                </p>
                                <p class="text-white fs-13px bg-danger d-inline-block p-1-5 m-0">{{ $post->category->name }}</p>
                                <p class="card-text text-black">
                                    <small style="font-size: 12px">
                                        <span>{{ $post->user->name }} - </span>
                                        <span>{{ $post->created_at->toDateTimeString() }}</span>
                                    </small>
                                </p>
                            </div>
                        </div>
                    @endforeach
                    <!--=== End Related post===-->
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#form-comment').validate();
    </script>
@endsection

