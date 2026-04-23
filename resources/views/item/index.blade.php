<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($items as $item)
            <li class="list-group-item">{{ $loop->iteration }}. {{ $item->item_code }} --{{ $item->item_name }}
                --{{ $item->category }}
                --{{ $item->stock }} --{{ $item->price }}</li>
        @endforeach

    </ul>


</x-app>
