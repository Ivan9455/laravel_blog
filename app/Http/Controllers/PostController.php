<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Post;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $user = User::find($id);
        if (isset($user->id)) {
            return view('user', ['name' => $user->name, 'id' => $user->id]);
        }

        return view('user', ['name' => false, 'id' => false]);
    }

    public function all(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['id_user']);
        if (isset($user->id)) {
            $posts = DB::select('
            SELECT *, COALESCE((SELECT COUNT(ratings.status)
                    FROM ratings
                    WHERE ratings.status = \'1\'
                      AND posts.id = ratings.id_post)) as count_like,
          COALESCE((SELECT COUNT(ratings.status)
                    FROM ratings
                    WHERE ratings.status = \'-1\'
                      AND posts.id = ratings.id_post)) as count_dislike
FROM posts
WHERE posts.id_user = ?
ORDER by count_like, count_dislike , posts.created_at  DESC   LIMIT 3', [$user->id]);

            return view('post.all', ['posts' => collect($posts)]);
        }

        return view('post.all', []);
    }

    public function status(Request $request)
    {
        $post = $request->all();
        if (Rating::all()
            ->where('id_post', '=', $post['id'])
            ->where('id_user', '=', Auth::id())->isEmpty()) {
            Rating::create([
                'id_user' => Auth::id(),
                'id_post' => $post['id'],
                'status' => $post['status']
            ]);
        } else {
            $rating = Rating::all()
                ->where('id_post', '=', $post['id'])
                ->where('id_user', '=', Auth::id())->first();
            if ($rating->status !== $post['status']) {
                Rating::find($rating->id)->update(['status' => $post['status']]);
            } else {
                Rating::find($rating->id)->delete();
            }
        }
    }

    public function best()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        Post::create([
            'content' => $data['content'],
            'id_user' => Auth::id(),
            'created_at' => now(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
