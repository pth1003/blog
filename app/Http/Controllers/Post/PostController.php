<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:list post|edit post|delete post|create post']);
    }

    /**
     * return list post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function postManagement($id)
    {
        $category = Category::all();
        $nameCategory = 'All';
        if ($id == 'all') {
            $posts = Post::with('user', 'category')->get();
        } else {
            $nameCategory = Category::find($id)->name;
            $posts = Post::with('user', 'category')->where('category_id', $id)->get();
        }
        return view('backend.post.posts', compact('posts', 'category', 'nameCategory'));
    }


    /**
     * post: get id post
     * isCat: get category id
     * category: get all category
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function editPost(Request $request, $id)
    {
        if ($request->method() == 'GET') {
            $post = Post::find($id);
            $idCat = Post::find($id)->category_id;
            $categoty = Category::all();
            return view('backend.post.edit', compact('post', 'categoty', 'idCat'));
        } else {
            $dataEdit = [
                'title' => $request->title,
                'content' => $request->contentt,
                'category_id' => $request->category
            ];

            Post::where('id', $id)->update($dataEdit);
            return redirect()->route('backend.post.list', ['id' => 'all']);
        }
    }


    /**
     * get: return from addPost
     * post: insert dataInsert to Post
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function addPost(Request $request)
    {
        if ($request->method() == "GET") {
            $categoty = Category::all();
            return view('backend.post.add', compact('categoty'));
        } else {
            $file = $request->file('image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $dataInsert = [
                'title' => $request->title,
                'content' => $request->contentt,
                'image' => $filename,
                'category_id' => $request->category,
                'user_id' => auth()->user()->id
            ];
            Post::create($dataInsert);
            return redirect()->route('backend.post.list', ['id' => 'all']);
        }
    }

    /**
     * delete post
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deletePost($id)
    {
        Post::where('id', $id)->delete();
        return redirect()->route('backend.post.list', ['id' => 'all']);
    }

}
