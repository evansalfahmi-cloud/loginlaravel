<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

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
            'user_id' => Auth::id(), // Menggunakan user yang sedang login
            'category_id' => 1, // Gantilah sesuai kategori yang ada
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

    // Menampilkan halaman edit artikel
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('blog_edit', compact('article')); // Buat file 'blog_edit.blade.php'
    }

    // Memperbarui artikel yang telah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $article = Article::findOrFail($id);

        // Update gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = $article->image;
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imagePath,
        ]);

        return redirect()->route('blog.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    // Menghapus artikel
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->route('blog.index')->with('success', 'Artikel berhasil dihapus!');
    }
}