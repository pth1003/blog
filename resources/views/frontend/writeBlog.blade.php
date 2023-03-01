@extends('frontend.layout.layout')
@section('content')
    <style>
        .input-post-blog {
            border: none;
            outline: none;
            border-bottom: 2px solid #ccc;
            background-color: transparent;
        }

        .text-area-blog {
            border: 2px solid #ccc;
            outline: none;
        }

        .input-post-blog:focus, .text-area-blog:focus {
            border-color: #198754;
        }
    </style>
    <div class="container">
        <p class="fw-bold fs-1 text-center">Write Blog</p>
        <form method="POST" enctype="multipart/form-data">
            <div class="w-100 mb-4">
                <label class="fs-4 fw-bold">Title</label>
                <input class="w-100 input-post-blog" type="text" placeholder="Blog title" name="title"/>
            </div>
            <div class="w-100 mb-4">
                <label class="fs-4 fw-bold">Content</label>
                <textarea rows="5" class="w-100 text-area-blog" name="content">Content</textarea>
            </div>
            <div class="w-100 mb-4">
                <label class="fs-4 fw-bold">Select image</label>
                <input type="file" name="image">
            </div>
            <div class="w-100">
                <label class="fs-4 fw-bold">Select category</label>
                <select name="category">
                    @foreach($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success w-100 mt-4">Post</button>
            @csrf
        </form>
    </div>
@endsection
