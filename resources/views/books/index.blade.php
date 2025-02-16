<div><a href="/">Home</a></div>
<a href="{{ route('books.create') }}">New Book</a>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<table cellpadding="10" cellspacing="1" border="1">
    <thead>
    <tr>
        <td>No.</td>
        <td>Title</td>
        <td>Serial Number</td>
        <td>Published At</td>
        <td>Author</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @forelse($books as $key => $book)
        <tr>
            <td>{{ $books->firstItem() + $key }}.</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->serial_number }}</td>
            <td>{{ $book->published_at ? $book->published_at->format('F d, Y') : 'N/A' }}</td>
            <td>{{ $book->author->name ?? 'Unknown' }}</td>
            <td>
                <a href="{{ route('books.edit', $book) }}">Edit</a>

                <form action="{{ route('books.destroy', $book) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this book?');">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No data found in table</td>
        </tr>
    @endforelse
    </tbody>
</table>

{{ $books->links() }}
