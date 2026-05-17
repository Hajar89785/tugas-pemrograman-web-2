<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <a class="btn btn-warning mb-3" href="{{ route('category.index') }}" role="button">Back</a>

    {{-- category --}}
    <h6>Daftar Category</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Name: {{ $category->name }}</li>
        <li class="list-group-item">
            Created At: {{ $category->created_at->format('d F Y H:i:s') }}</li>
        <li class="list-group-item">
            Last Update: {{ $category->updated_at->diffForHumans() }}</li>
    </ul>



    {{-- produk --}}
    <ul class="list-group">
        <h6>Daftar Produk</h6>
        @foreach ($category->produks as $produk)
            <li class="list-group-item">{{ $produk->name }}</li>
        @endforeach


    </ul>


</x-app>
