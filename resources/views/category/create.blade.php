<x-app>

    <x-slot:title>{{ $title }}</x-slot>

    <form method="POST" action="{{ route('category.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="code" class="form-label">Code</label>
            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code"
                value="{{ old('code') }}">
            @error('code')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                name="description" value="{{ old('description') }}">
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>



        <a class="btn btn-warning" href="{{ route('category.index') }}" role="button">Cancel</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</x-app>
