<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countPost = Post::all()->count();
        return view('backend.index', compact('countPost'));
    }

    /**
     * get list comment
     * @param $status
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function comment($status)
    {
        $comments = Comment::with('user')->where('status', $status)->simplePaginate(8);
        $idStatus = 0;
        foreach ($comments as $status){
           $idStatus = $status->status;
        }
        return view('backend.comment', compact('comments', 'idStatus'));
    }

    /**
     * handle comment delete and update
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleComment($id)
    {
        $url = substr(url()->current(), -3);
        if($url == 'del'){
            Comment::find($id)->delete();
            return redirect()->route('backend.comment.list', ['status'=>1]);
        } else {
            Comment::where('id', $id)->update(['status'=>1]);
            return redirect()->route('backend.comment.list', ['status'=>1]);
        }
    }

    /**
     * update status all comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmAllComment()
    {
       $comment = Comment::all();
       foreach ($comment as $status){
           Comment::where('id', $status->id)->update(['status'=>1]);
       }
       return redirect()->route('backend.comment.list', ['status'=>1]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postManagement($id)
    {
        $category = Category::all();
        $nameCategory = 'All';
        if($id == 'all'){
            $posts = Post::with('user', 'category')->get();
        } else {
            $nameCategory = Category::find($id)->name;
            $posts = Post::with('user', 'category')->where('category_id', $id)->get();
        }
        return view('backend.posts', compact('posts', 'category', 'nameCategory'));
    }
}
