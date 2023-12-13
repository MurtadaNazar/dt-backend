<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        return view('comments.create');
    }

    public function indexApi()
    {
        $comments = Comment::all();

        $data = [];
        foreach ($comments as $comment) {
            $data[] = [
                'id' => $comment->id,
                'name' => $comment->name,
                'text' => $comment->text,
                'avatar_url' => $comment->avatar_url,
                'stars' => $comment->starts,
                'date' => $comment->date,
            ];
        }

        return response()->json($data);
    }

    public function store(Request $request)
    {
        $filename = null;
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'text' => 'required|string',
            'starts' => 'required|integer|min:1|max:5',
            'date' => 'nullable|date_format:Y-m-d',
        ]);

        // Handle image upload
        if ($request->file('avatar_url')) {
            $file = $request->file('avatar_url');
            @unlink(public_path('upload/comments_avater'));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/comments_avater'), $filename);
        }
        $data = $request->only([
            'name', 'text', 'starts', 'date'
        ]);

        if ($filename) {
            $data['avatar_url'] = $filename;
        }
        Comment::create($data);

        return redirect()->route('comments.index')
            ->with('success', 'Comment created successfully!');
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $filename = null;
        $comment = Comment::findOrFail($id);
        $this->validate(
            $request,
            [
                'name' => 'required|string|max:255',
                'text' => 'required|string',
                'avatar_url' => 'nullable|url',
                'starts' => 'required|integer|min:1|max:5',
                'date' => 'nullable|date_format:Y-m-d',
            ]
        );

        if ($request->hasFile('avater_url')) {
            $file = $request->file('avater_url');
            $com = $comment;
            $old_avater = $com->avater_url;
            if ($old_avater && file_exists(public_path('upload/comments_avater/' . $old_avater))) {
                @unlink(public_path('upload/comments_avater/' . $old_avater));
            }

            $filename = date('YmdHi') . $file->getClientOriginalName();


            $file->move(public_path('upload/comments_avater'), $filename);

            $com->update(['comments_avater' => $filename]);
        }
        $data = $request->only([
            'name', 'text', 'avater_url', 'starts', 'date'
        ]);
        if ($filename) {
            $data['avater_url'] = $filename;
        }

        $comment->update($data);

        return redirect()->route('comments.index')
            ->with('success', 'Comment updated successfully!');
    }

    public function show(string $id)
    {
        $comment = Comment::findOrFail($id);
        return view('comments.show', compact('comment'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('comments.index')
            ->with('success', 'Comment deleted successfully!');
    }
}
