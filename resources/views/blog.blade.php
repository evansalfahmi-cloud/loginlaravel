<x-layout>
    <div class="container mt-4">
        <h1 class="text-center mb-4">Blog</h1>

        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-6">
                    <article class="mb-4 p-4 border rounded shadow-sm bg-light">
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid mb-3 rounded" alt="{{ $article->title }}">
                        @endif
                        <h2 class="text-primary">{{ $article->title }}</h2>
                        <div class="text-muted mb-2">
                            <a href="#" class="text-decoration-none fw-bold">{{ $article->user->name }}</a> | {{ date('d M Y', strtotime($article->created_at)) }}
                        </div>
                        <p class="text-justify">
                            {{ Str::limit($article->content, 150, '...') }}
                        </p>
                        <a href="{{ route('blog.show', $article->id) }}" class="btn btn-primary">Read More &raquo;</a>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
