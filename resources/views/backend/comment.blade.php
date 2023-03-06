@extends('backend.layout')
@section('comment')
    <style>
        .fs-13px {
            font-size: 13px;
        }
    </style>
    <p>Dashboard / Comment</p>
    <div class="d-flex align-items-center justify-content-between w-30">
        <h5 class="fw-bold"> <i class="bi bi-chat-dots-fill fs-2 text-danger"></i> Comment List -
            <span class="text-success">
                @if ($idStatus == 1)
                    Solved
                @else
                    Pending
                @endif
            </span>
        </h5>
        <a class="btn btn-success btn-sm" href="{{ route('backend.comment.list', ['status'=>0]) }}">Pending <i class="bi bi-hourglass-bottom"></i></a>
        <a class="btn btn-warning btn-sm text-white" href="{{ route('backend.comment.list', ['status'=>1]) }}">Solved <i class="bi bi-cloud-check-fill"></i></a>
    </div>
    <div class="comment p-3 mt-2 bg-white">
        @if($comments->count() > 0)
            <table class="table text-left fs-13px">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th class="w-50">Content comment</th>
                    <th>Time comment</th>
                    <th class="text-center">Edit</th>
                </tr>
                </thead>
                <tbody class="table-group-divider">
                @foreach($comments as $key => $comment)
                    <tr>
                        <th>{{ ++$key }}</th>
                        <td>Pham trung hau</td>
                        <td>{{ $comment->content }}</td>
                        <td>17:22:44 Thus Wnd 2023</td>
                        @if($comment->status == 1)
                            <td class="text-center text-success fw-bold">
                                <a onclick="return confirm('Confirm delete comment?')"
                                   href="{{ route('backend.comment.del',['id'=>$comment->id]) }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        @else
                            <td class="text-center text-success fw-bold">
                                <a
                                    onclick="return confirm('Confirm update status of comment?')"
                                    href="{{ route('backend.comment.update',['id'=>$comment->id]) }}">
                                    <i class="bi bi-check-square"></i>
                                </a>
                            </td>
                            <td class="text-center text-success fw-bold">
                                <a
                                    onclick="return confirm('Confirm delete comment?')"
                                    href="{{ route('backend.comment.del',['id'=>$comment->id]) }}">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        @endif
                    </tr>
                @endforeach
                @else
                    <h2>No comments pending</h2>
                @endif
                </tbody>
            </table>
            @if ($idStatus == 0)
                <a href="{{ route('backend.comment.confirmAll') }}" class="btn btn-danger">Confirm all</a>
            @endif
    </div>
    <div class="pagination d-flex justify-content-center mt-3">
        {!! $comments->links() !!}
    </div>
@endsection
