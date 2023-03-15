<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:edit comment');
    }

    /**
     * get list comment
     * @param $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function comment($status)
    {
        try {
            $countCmtPending = Comment::status(0)->count();
            $countCmtSolved = Comment::status(1)->count();
            $countCommentOfPost = Comment::with('post')->where('status', 1)->groupBy('post_id')
                                ->select('post_id', DB::raw('count(*) as totalCmt'))->simplePaginate(5);
            $comments = Comment::with('user', 'post')->where('status', $status)->simplePaginate(7);
            $idStatus = 0;
            foreach ($comments as $status) {
                $idStatus = $status->status;
            }
            return view('backend.comment', compact('comments', 'idStatus', 'countCmtPending', 'countCmtSolved', 'countCommentOfPost'));
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

    /**
     * handle comment delete and update
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleComment($id)
    {
        try {
            Comment::where('id', $id)->update(['status' => 1]);
            return redirect()->route('backend.comment.list', ['status' => 1]);
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }


    public function deleteComment($id)
    {
        try {
            Comment::find($id)->delete();
            return redirect()->route('backend.comment.list', ['status' => 1]);
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }


    /**
     * update status all comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmAllComment()
    {
        try {
            $comment = Comment::all();
            foreach ($comment as $status) {
                Comment::where('id', $status->id)->update(['status' => 1]);
            }
            return redirect()->route('backend.comment.list', ['status' => 1]);
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }


    /**
     * comment: return all comment with status = 1(solved)
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function detailComment($id)
    {
        try {
            $comments = Comment::with('post')->where('post_id', $id)->where('status', 1)->simplePaginate(10);
            return view('backend.post.detailComment', compact('comments'));
        } catch (\Exception $e) {
            Log::error($e->getTraceAsString());
            return redirect()->route('frontend.error', ['msg' => $e->getMessage()]);
        }
    }

}
