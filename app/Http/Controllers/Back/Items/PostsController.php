<?php

namespace App\Http\Controllers\Back\Items;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'title'      => $request->input('title'),
            'content'    => $request->input('content'),
            'ranking'    => (Post::where('deleted', false)->max('ranking') ?? 0) + 1,
            'published'  => $request->boolean('published'),
            'created_at' => time(),
            'created_by' => Auth::id(),
        ];

        if ($request->boolean('published')) {
            $data['published_at'] = time();
            $data['published_by'] = Auth::id();
        }

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        Post::create($data);

        return redirect()->back()->with('success', 'Post créé avec succès.');
    }

    public function update(Post $post, Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'title'     => $request->input('title'),
            'content'   => $request->input('content'),
            'published' => $request->boolean('published'),
        ];

        if ($request->boolean('published') && !$post->published) {
            $data['published_at'] = time();
            $data['published_by'] = Auth::id();
        }

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->back()->with('success', 'Post mis à jour avec succès.');
    }

    public function destroy(Post $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->update([
            'deleted'    => true,
            'deleted_at' => time(),
            'deleted_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Post supprimé avec succès.');
    }
}
