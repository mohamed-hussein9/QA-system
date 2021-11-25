<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Post;
use App\models\Comment;
use App\models\Subcomment;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        if ($request->has('photo')) {
            $photo = $request->photo;
            $newPhoto = time() . '_' . $photo->getClientOriginalName();
            $photo->move('uploads/posts', $newPhoto);
            $post = Post::create([
                'user_id'   => Auth::id(),
                'title'     => $request->title,
                'body'      => $request->body,
                'photo'     => $newPhoto,

            ]);
        } else {
            $post = Post::create([
                'title'     => $request->title,
                'body'      => $request->body,
                'photo'     => 'default.jpg',
                'user_id'   => Auth::id()
            ]);
        }
    }


    public function show($id)
    {
        $post = Post::where('id', $id)->get()->first();
        // foreach ($post->comments as $comment) {
        //     foreach ($comment->subComments as $subcomment) {
        //         echo $subcomment->body;
        //     }
        // }

        return view('posts.show')->with(['post' => $post]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
