<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <a class="btn btn-primary mb-3" href="{{ route('produk.index') }}" role="button">Back</a>

    <ul class="list-group">
        @foreach ($produks as $produk)
            <li class="list-group-item">{{ $loop->iteration }}. {{ $produk->name }} --{{ $produk->category->name }}
                --{{ $produk->brand }}
                --{{ $produk->unit }} --{{ $produk->specification }} --{{ $produk->status }}

            </li>
        @endforeach

    </ul>


</x-app>
