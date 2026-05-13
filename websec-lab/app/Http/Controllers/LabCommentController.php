<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::query()->latest()->get();

        return view('lab.comments', compact('comments'));
    }

    /**
     * Намеренно сохраняет и отображает HTML как есть (stored XSS).
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => ['required', 'string', 'max:10000'],
        ]);

        Comment::query()->create([
            'user_id' => Auth::id(),
            'body' => $data['body'],
        ]);

        return redirect()->route('comments.index');
    }
}
