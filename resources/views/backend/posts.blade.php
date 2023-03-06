@extends('backend.layout')
@section('posts')
    <div class="posts container-fluid bg-white mt-4">
        <div class="d-flex align-items-center">
            <h5 class="fw-bold p-2 m-0">Posts list - <span class="text-success">{{ $nameCategory }}</span></h5>
            <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Category
                </button>
                <div class="dropdown-menu bg-white p-3 " aria-labelledby="dropdownMenuButton">
                    @foreach($category as $cat)
                        <a class="d-block text-decoration-none text-black link-a"
                           href="{{ route('backend.post.list',['id'=>$cat->id]) }}">{{ $cat->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <table class="table fs-13px">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Category</th>
                <th>Name</th>
                <th>created_at</th>
                <th>Edit</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $key => $post)
                <tr>
                    <th>{{++$key}}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                    <td>
                        <i class="bi bi-pencil text-success"></i>&nbsp;&nbsp;&nbsp;
                        <i class="bi bi-trash2 text-danger"></i>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
