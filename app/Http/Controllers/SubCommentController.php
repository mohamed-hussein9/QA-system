<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Subcomment;
use Illuminate\Support\Facades\Auth;

class SubCommentController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'body' => 'required'
        ]);
        Subcomment::create([
            'user_id' => Auth::id(),
            'comment_id' => $id,
            'body' => $request->body,
            'photo' => 'default.jpg',
        ]);
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
