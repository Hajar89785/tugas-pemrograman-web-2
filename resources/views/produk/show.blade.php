<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <a class="btn btn-warning mb-3" href="{{ route('produk.index') }}" role="button">Back</a>

    {{-- category --}}
    <h6>Data Produk</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Name: {{ $produk->name }}</li>
        <li class="list-group-item">
            Created At: {{ $produk->created_at->format('d F Y H:i:s') }}
        </li>
        <li class="list-group-item">
            Last Update: {{ $produk->updated_at->diffForHumans() }}
        </li>
    </ul>


    {{-- produk --}}
    <h6>Data Category</h6>
    <ul class="list-group">

        <li class="list-group-item">Category Name: {{ $produk->category->name }}</li>


    </ul>


</x-app>
