<x-layout>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Selamat Datang di Halaman Blog</h1>

        <a href="{{ route('blog.create') }}" class="btn btn-success mb-3">Tambah Artikel</a>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        @if($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Artikel Image">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ Str::limit($article->content, 100, '...') }}</p>
                            <a href="{{ route('blog.show', $article->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>
