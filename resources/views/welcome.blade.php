<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Books & Authors</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
    </head>
    <body class="container py-4">
        <div class="mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-primary"
                >Add New Book</a
            >
            <a href="{{ route('authors.create') }}" class="btn btn-success"
                >Add New Author</a
            >
        </div>

        <h1 class="text-center mb-4">Books & Authors</h1>

        @if(session('message'))
        <div class="alert alert-success">{{ session("message") }}</div>
        @endif

        <h2 class="mt-4">Book List</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Serial Number</th>
                    <th>Published At</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $key => $book)
                <tr>
                    <td>
                        {{ ($books->currentPage() - 1) * $books->perPage() + $key + 1 }}
                    </td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->serial_number }}</td>
                    <td>
                        {{$book->published_at ? \Carbon\Carbon::parse($book->published_at)->format('Y-m-d') : ''
                        }}
                    </td>
                    <td>{{ $book->author->name ?? 'Unknown' }}</td>
                    <td>
                        <a
                            href="{{ route('books.edit', $book->id) }}"
                            class="btn btn-warning btn-sm"
                            >Edit</a
                        >
                        <form
                            action="{{ route('books.destroy', $book->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $books->links('pagination::bootstrap-5') }}
        </div>

        <h2 class="mt-5">Author List</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Author Name</th>
                    <th>Total Books</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($authors as $key => $author)
                <tr>
                    <td>
                        {{ ($authors->currentPage() - 1) * $authors->perPage() + $key + 1 }}
                    </td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->books->count() }}</td>
                    <td>
                        <a
                            href="{{ route('authors.edit', $author->id) }}"
                            class="btn btn-warning btn-sm"
                            >Edit</a
                        >
                        <form
                            action="{{ route('authors.destroy', $author->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf @method('DELETE')
                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure?')"
                            >
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $authors->links('pagination::bootstrap-5') }}
        </div>
    </body>
</html>
