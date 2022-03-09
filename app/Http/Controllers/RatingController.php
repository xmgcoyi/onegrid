<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function capture(Request $request, Post $post)
    {
        $request->validate([
            'score' => 'required|numeric'
        ]);
        $rating = new Rating();
        $rating->score = $request->score;
        $post->ratings()->save($rating);

        return redirect(route('post.show', ['post' => $post]))->with('success', 'Score updated!');
    }
}
