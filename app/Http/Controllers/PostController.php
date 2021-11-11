<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = post::all();
        // $posts = post::get();
        // $post = post::where('id', 1)->get();
        // $post = post::find(2); 
        // return $post;
        return view('posts.index', compact('posts'));
    }

    //---------------------insert------------------
    public function create()
    {
        return view('posts.addpost');
    }
    public function store(Request $request)
    {

        $posts = new post();
        $posts->title = $request->title;
        $posts->body = $request->body;
        $posts->save();
        // post::create([
        //     'title' => $request->title,
        //     'body' => $request->body
        // ]);
        return redirect('posts')->with('msg', 'Done');
    }

    //---------------------edit------------------
    public function edit($id)
    {
        $post = post::findorfail($id);
        return view('posts.editpost', compact('post'));
    }
    public function update(Request $request, $id)
    {
        // $posts = post::findorfail($id);
        // $posts->title = $request->title;
        // $posts->body = $request->body;
        // $posts->save();

        $posts = post::findorfail($id);
        dd($posts);
        $posts->update($request->all());
        return redirect('posts')->with('msg', 'Data is Updated');
    }

    //---------------------delete------------------
    public function destroy($id)
    {
        post::destroy($id);
        return redirect()->route('posts.index')->with('msg', 'Data is Deleted');
    }
}
