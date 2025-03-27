<x-layout>
    <div class="container mt-4">
        <h2 class="text-primary">{{ $article->title }}</h2>
        <p class="text-muted">Ditulis oleh Admin | {{ $article->created_at->format('d M Y') }}</p>

        @if($article->image)
            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mb-3" alt="Artikel Image">
        @endif

        <p>{{ $article->content }}</p>

        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</x-layout>
