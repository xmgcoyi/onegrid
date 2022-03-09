<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class EnsureUserIsValid
{
    /**
     * @param Request $request
     * @param Closure $next
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->isValidUser($request->user(), $request->route('post'))) {
            $errors = new MessageBag();
            $errors->add('errors', 'User may not edit post');
            return redirect(route('post.index', ['post' => $request->route('post')]))->withErrors($errors);
        }

        return $next($request);
    }

    /**
     * @param $user
     * @param $post
     * @return bool
     */
    private function isValidUser($user, $post)
    {
        return $user !== null && $user->id !== $post->user->id;
    }
}
