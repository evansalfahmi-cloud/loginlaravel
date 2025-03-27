<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // Import model Artikel

class ArticleController extends Controller
{
    // Menampilkan daftar artikel di halaman blog
    public function index()
    {
        $articles = Article::latest()->paginate(6); // Ambil 6 artikel terbaru
        return view('blog', compact('articles'));
    }

    // Menampilkan halaman form tambah artikel
    public function create()
    {
        return view('blog_create'); // Buat file 'blog_create.blade.php' di resources/views/
    }

    // Menyimpan artikel baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Simpan artikel
        Article::create([
            'user_id' => 1, // Gantilah dengan user yang sedang login (gunakan Auth::id())
            'category_id' => 1, // Sesuaikan dengan kategori yang tersedia
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
            'views' => 0,
        ]);

        return redirect()->route('blog.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    // Menampilkan detail artikel berdasarkan ID
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('blog_show', compact('article')); // Buat file 'blog_show.blade.php' di resources/views/
    }
}
