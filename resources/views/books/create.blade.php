<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Create Book</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>
    <body class="container mt-5">
        <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>
        <h1 class="mb-4">Create Book</h1>

        @if(session('message'))
        <div class="alert alert-success">{{ session("message") }}</div>
        @endif

        <form
            action="{{ route('books.store') }}"
            method="post"
            class="card p-4 shadow-sm"
        >
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    placeholder="Enter book title"
                    value="{{ old('title') }}"
                />
                @error('title')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="serial_number" class="form-label"
                    >Serial Number</label
                >
                <input
                    type="text"
                    name="serial_number"
                    id="serial_number"
                    class="form-control"
                    placeholder="Enter serial number"
                    value="{{ old('serial_number') }}"
                />
                @error('serial_number')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="published_at" class="form-label"
                    >Published At</label
                >
                <input
                    type="date"
                    name="published_at"
                    id="published_at"
                    class="form-control"
                    value="{{ old('published_at') }}"
                />
                @error('published_at')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="author_id" class="form-label">Author</label>
                <select name="author_id" id="author_id" class="form-select">
                    <option value="">Select</option>
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}" @if ($author->
                        id === (int)old('author_id')) selected @endif>
                        {{ $author->name }}
                    </option>
                    @endforeach
                </select>
                @error('author_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </body>
</html>
