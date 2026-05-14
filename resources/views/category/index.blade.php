<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('category.create') }}" role="button">Create</a>

    <form action="">
        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Search category..."
                    value="{{ request('keyword') }}">

            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-success">Search</button>

            </div>
        </div>

    </form>

    <ul class="list-group">
        @foreach ($categorys as $category)
            <li class="list-group-item">{{ $categorys->firstItem() + $loop->index }}. {{ $category->code }}
                --{{ $category->name }}
                <a class="btn btn-warning btn-sm" href="{{ route('category.edit', $category) }}" role="button">Edit</a>
                <form action="{{ route('category.destroy', $category) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin?')">Delete</button>
                </form>

            </li>
        @endforeach

    </ul>

    {{ $categorys->links() }}

</x-app>
