<x-layout>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Selamat Datang di Halaman Blog</h1>

        <!-- Tombol Tambah Artikel -->
        <div class="text-end mb-3">
            <a href="{{ route('blog.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Tambah Artikel
            </a>
        </div>

        <!-- Daftar Artikel -->
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-4 mb-4">
                    <div class="card shadow-sm">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Artikel Image">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Default Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="text-muted">Ditulis oleh <b>{{ $article->user->name }}</b> | {{ $article->created_at->format('d M Y') }}</p>
                            <p class="card-text">{{ Str::limit($article->content, 100, '...') }}</p>
                            <a href="{{ route('blog.show', $article->id) }}" class="btn btn-primary">
                                Read More <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $articles->links('pagination::bootstrap-5') }}
        </div>
    </div>
</x-layout>
