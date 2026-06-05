<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('produk.create') }}" role="button">Create</a>

    <form action="">
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search produk..."
                    value="{{ request('keyword') }}">

            </div>
            <div class="col-md-4">
                <select class="form-select" id="category_id" name="category_id">
                    <option value="">All Produk</option>
                    @foreach ($categorys as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>

            </div>
        </div>
    </form>

    <ul class="list-group">
        @foreach ($produks as $produk)
            <li class="list-group-item">{{ $produks->firstItem() + $loop->index }}. {{ $produk->name }} --
                {{ $produk->category->name }}
                --{{ $produk->brand }} --{{ $produk->unit }} --{{ $produk->specification }} --{{ $produk->status }}
                <a class="btn btn-info btn-sm" href="{{ route('produk.show', $produk) }}" role="button">Detail</a>
                <a class="btn btn-warning btn-sm" href="{{ route('produk.edit', $produk) }}" role="button">Edit</a>
                <form action="{{ route('produk.destroy', $produk) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin?')">Delete</button>
                </form>

            </li>
        @endforeach

    </ul>

    {{ $produks->links() }}


</x-app>
