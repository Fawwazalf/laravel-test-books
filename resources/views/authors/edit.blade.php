<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit Author</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>
    <body class="container py-5">
        <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Back</a>

        <div class="card shadow p-4">
            <h2 class="mb-4">Edit Author</h2>

            @if(session('message'))
            <div class="alert alert-success">{{ session("message") }}</div>
            @endif

            <form
                action="{{ route('authors.update', $author->id) }}"
                method="post"
            >
                @csrf @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id="name"
                        placeholder="Enter author name"
                        value="{{ old('name', $author->name) }}"
                    />
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        class="form-control"
                        name="email"
                        id="email"
                        placeholder="Enter email"
                        value="{{ old('email', $author->email) }}"
                    />
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="created_at" class="form-label"
                        >Created At</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="created_at"
                        value="{{ $author->created_at->format('F d, Y') }}"
                        disabled
                    />
                </div>

                <div class="mb-3">
                    <label for="updated_at" class="form-label"
                        >Updated At</label
                    >
                    <input
                        type="text"
                        class="form-control"
                        id="updated_at"
                        value="{{ $author->updated_at->format('F d, Y') }}"
                        disabled
                    />
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
