<?php

namespace App\Http\Controllers;

use App\Models\{Post, Comment};
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    public function __construct() {
        $this->middleware('admin')->only(['index', 'destroy', 'edit', 'update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comments.index', ['comments'=>Comment::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_id'=>'required|numeric|exists:App\Models\Post,id',
            'title'=>'required|min:2|max:255',
            'author'=>'required|min:2|max:50',
            'content'=>'required|min:5',
        ]);
        $comment = Post::find($request->input('post_id'))->comments()->create($validatedData);

        return redirect()->back()->with('success', 'Le commentaire a été créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $validatedData = $request->validate([
            'title'=>'required|min:2|max:255',
            'author'=>'required|min:2|max:50',
            'content'=>'required|min:5',
        ]);
        $comment->update($validatedData);

        return redirect()->back()->with('success', 'Le commentaire a été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->back()->with('success', 'Le commentaire a été supprimé');
    }

    public function report(Comment $comment) {
        $comment->reported = 1;
        $comment->save();
        // On aurait pu aussi utiliser la méthode update
        // $comment->update(['reported'=>1]);

        return redirect()->back()->with('success', 'Le commentaire a été signalé');
    }
}
