@extends('backend.layout')
@section('posts')
    <p>Dashboard / Post</p>
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <h5 class="fw-bold m-0"><i class="bi bi-stickies fs-2 text-warning"></i> Posts list - <span
                    class="text-success">{{ $nameCategory }}</span></h5>
            <div class="dropdown p-2">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-tags"></i> Category
                </button>
                <div class="dropdown-menu bg-white p-3 " aria-labelledby="dropdownMenuButton">
                    @foreach($category as $cat)
                        <a class="d-block text-decoration-none text-black link-a"
                           href="{{ route('backend.post.list',['id'=>$cat->id]) }}">{{ $cat->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <a class="btn btn-success" href="{{route('backend.post.add')}}">Add Post</a>
    </div>
    <div class="posts container-fluid bg-white mt-1">
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
                        <a href="{{route('backend.post.edit', ['id'=>$post->id])}}">
                            <i class="bi bi-pencil text-success"></i>
                        </a>&nbsp;&nbsp;&nbsp;
                        <a onclick="return confirm('Confirm delete post?')" href="{{ route('backend.post.delete', ['id'=>$post->id]) }}">
                            <i class="bi bi-trash2 text-danger"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
