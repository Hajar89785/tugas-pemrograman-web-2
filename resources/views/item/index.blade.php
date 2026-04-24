<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('item.create') }}" role="button">Create</a>

    <ul class="list-group">
        @foreach ($items as $item)
            <li class="list-group-item">{{ $loop->iteration }}. {{ $item->item_code }} --{{ $item->item_name }}
                --{{ $item->category }}
                --{{ $item->stock }} --{{ $item->price }}
                <a class="btn btn-warning btn-sm" href="{{ route('item.edit', $item) }}" role="button">Edit</a>

            </li>
        @endforeach

    </ul>


</x-app>
