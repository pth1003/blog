@extends('backend.layout')
@section('editPost')
    <div class="d-flex justify-content-center align-items-center flex-column">
        <p><span class="fs-2"><i class="bi bi-plus-circle fs-2 text-success"></i> Edit Post</span></p>
        <form class="w-75" method="POST" enctype="multipart/form-data" id="form-write">
            <fieldset>
                <div class="w-100 mb-4">
                    <label class="fs-4 fw-bold">Title</label>
                    <input class="w-100 input-post-blog" type="text" placeholder="Blog title" name="title"
                           value=" {{$post['title'] }}" required/>
                </div>
                <div class="w-100 mb-4">
                    <label class="fs-4 fw-bold">Content</label>
                    <textarea rows="10" class="w-100 text-area-blog" name="contentt"
                              required>{{$post['content'] }}</textarea>
                </div>
                <div class="w-100">
                    <label class="fs-4 fw-bold">Select category</label>
                    <select name="category">
                        @foreach($categoty as $cat)
                            <option value="{{ $cat->id }}"
                                    @if($cat->id == $idCat) selected @endif>{{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-4">Post</button>
            </fieldset>
            @csrf
        </form>
    </div>
@endsection

