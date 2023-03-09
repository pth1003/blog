@extends('backend.layout')
@section('detailComment')
    <h4>All comments of post -
        @foreach($comments as $key=>$cmt)
            @if($key === 1)
                "{{$cmt->post->title}}"
            @endif
        @endforeach
    </h4>
    <div class="bg-white p-2">
        <table class="table text-left">
            <thead>
            <tr>
                <th>Id cmt</th>
                <th>Title</th>
                <th>Time commment</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            @foreach($comments as $cmt)
                <tr>
                    <td>{{$cmt->id}}</td>
                    <td>{{$cmt->content}}</td>
                    <td>{{$cmt->created_at}}</td>
                </tr>
            @endforeach
            <tbody>
        </table>
        <a href="{{route('backend.comment.list', ['status'=>1])}}" class="btn btn-dark">Back</a>
    </div>
    {!! $comments->links() !!}
@endsection
