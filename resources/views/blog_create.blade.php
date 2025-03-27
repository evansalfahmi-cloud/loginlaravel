<x-layout>
    <div class="container mt-4">
        <h2>Tambah Artikel Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Judul Artikel</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            
            <div class="mb-3">
                <label for="content" class="form-label">Isi Artikel</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Gambar (Opsional)</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</x-layout>