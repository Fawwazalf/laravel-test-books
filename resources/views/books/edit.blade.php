<div style="margin-bottom: 1em;">
    <a href="{{ route('books.index') }}">Book List</a>
</div>

<h1>Edit Book</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<form action="{{ route('books.update', $book) }}" method="post">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 1em;">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Enter book title" value="{{ old('title', $book->title) }}">
        @error('title')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1em;">
        <label for="serial_number">Serial Number</label>
        <input type="text" name="serial_number" id="serial_number" placeholder="Enter serial number" value="{{ old('serial_number', $book->serial_number) }}">
        @error('serial_number')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1em;">
        <label for="published_at">Published At</label>
        <input type="date" name="published_at" id="published_at" value="{{ old('published_at', $book->published_at ? $book->published_at->format('Y-m-d') : '') }}">
        @error('published_at')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1em;">
        <label for="author_id">Author</label>
        <select name="author_id" id="author_id">
            <option value="">Select</option>
            @foreach($authors as $author)
                <option 
                    value="{{ $author->id }}" 
                    @if ($author->id === (int)old('author_id', $book->author_id)) selected @endif>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
        @error('author_id')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form>
