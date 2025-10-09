<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tag;
use App\Models\Thread;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    /**
     * Halaman daftar thread (forum utama).
     */
    public function index(Request $request)
    {
        // Ambil query pencarian kalau ada
        $search = $request->get('q');

        $threads = Thread::with('tags', 'user')
            ->when($search, function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest('last_activity')
            ->get();

        // Ambil thread populer (berdasarkan replies_count)
        $popular = Thread::orderByDesc('replies_count')
            ->take(3)
            ->get();

        return view('community', [
            'threads' => $threads,
            'popular' => $popular,
        ]);
    }

    /**
     * Halaman detail thread tunggal.
     */
    public function show($id)
    {
        $thread = Thread::with(['tags', 'user'])
            ->findOrFail($id);

        // Popular thread untuk sidebar
        $popular = Thread::orderByDesc('replies_count')
            ->take(3)
            ->get();

        return view('community-detail', [
            'thread'  => $thread,
            'popular' => $popular,
        ]);
    }

    public function storeComment(Request $request, $id)
{
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    $thread = Thread::findOrFail($id);

    // Simpan komentar baru
    Comment::create([
        'thread_id' => $thread->id,
        'user_id'   => auth()->id(),
        'content'   => $request->input('content'),
    ]);

    // ✅ Perbarui replies_count & last_activity dengan cara aman
    $thread->increment('replies_count');         // menambah 1 secara otomatis
    $thread->update(['last_activity' => now()]); // update kolom last_activity

    return back()->with('success', 'Komentar berhasil ditambahkan');
}

public function create()
{
    // Ambil semua tag (kategori)
    $tags = Tag::orderBy('name')->get();

    return view('community-add', compact('tags'));
}

public function store(Request $request)
{
    $request->validate([
        'title'   => 'required|string|max:255',
        'content' => 'required|string|min:20',
        'tags'    => 'required|array|min:1',
        'tags.*'  => 'exists:tags,id',
    ]);

    $thread = Thread::create([
        'title'         => $request->title,
        'content'       => $request->input('content'),
        'user_id'       => auth()->id(),
        'replies_count' => 0,
        'last_activity' => now(),
    ]);

    $thread->tags()->attach($request->tags);

    return redirect()->route('community.index', $thread->id)
                     ->with('success', 'Thread berhasil dibuat.');
}
}
