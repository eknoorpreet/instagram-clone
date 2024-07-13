<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\FileService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = new Post;
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png',
            'text' => 'required'
        ]);

        // For image upload
        $post = (new FileService)->updateFile($post, $request, 'post');

        $post->user_id = auth()->user()->id;
        $post->text = $request->input('text');

        // Save the post to the db
        $post->save();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!empty($post->file)) {
            // Get the file
            $currentFile = public_path() . $post->file;

            // If the file exists
            if (file_exists($currentFile)) {
                // Delete it
                unlink($currentFile);
            }
        }

        // Delete the post
        $post->delete();
    }
}
