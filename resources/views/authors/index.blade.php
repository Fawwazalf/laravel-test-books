<div><a href="/">Home</a></div>
<a href="{{ route('authors.create') }}">New Author</a>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<table cellpadding="10" cellspacing="1" border="1">
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Created At</td>
        <td>Updated At</td>
        <td>Action</td>
    </tr>
    </thead>
    <tbody>
    @forelse($authors as $author)
        <tr>
            <td>{{ $author->id }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->email }}</td>
            <td>{{ $author->created_at->format('F d, Y') }}</td>
            <td>{{ $author->updated_at->format('F d, Y') }}</td>
            <td>
                <a href="{{ route('authors.edit', $author) }}">Edit</a>

                <form action="{{ route('authors.delete', $author) }}" method="post" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this author?');">Delete</button>
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

{{ $authors->links() }}
