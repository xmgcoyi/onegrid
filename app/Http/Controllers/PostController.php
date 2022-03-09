<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view($this->setViewPrefix('index'), ['posts' => Post::all()]);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view($this->setViewPrefix('show'), compact('post'));
    }

    /**
     * @param $view
     * @return string
     */
    private function setViewPrefix($view)
    {
        if (Auth::check()) {
            return 'post.' . $view;
        }
        return 'post.guest.' . $view;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('post.create', ['post' => new Post()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        return $this->_store($request, Auth::user()->id, new Post(), 'post.create');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Post $post)
    {
        return $this->_store($request, Auth::user()->id, $post, 'post.edit');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete(Post $post)
    {
        $post->delete();

        return redirect(route('post.index'))->with('success', "Deleted successfully!");
    }

    /**
     * @param Request $request
     * @param $userId
     * @param Post $post
     * @param $returnRouteName
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    private function _store(Request $request, $userId, Post $post, $returnRouteName)
    {
        $request->validate($post->rules());

        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $userId;
        $post->save();

        return redirect(route('post.index'))->with('success', 'Saved Successfully!');
    }
}
