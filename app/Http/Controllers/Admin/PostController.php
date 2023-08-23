<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'min:3', 'max:255', Rule::unique('posts')->ignore($post->id)],
            'image' => ['url:https'],
            'content' => ['required', 'min:10'],
        ]);
        $data['slug'] = Str::of($data['title'])->slug('-');

        $post->update($data);

        return redirect()->route('admin.posts.show', compact('post'));
    }
    

    /**
     * Remove the specified resource from storage.
     */


    
        public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }

}