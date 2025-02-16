<div style="margin-bottom: 1em;">
    <a href="{{ route('authors.index') }}">Author List</a>
</div>

<h1>Edit Author</h1>

@if(session('message'))
    <div style="color: green;">{{ session('message') }}</div>
@endif

<form action="{{ route('authors.update', $author) }}" method="post">
    @csrf
    @method('PUT')

    <div style="margin-bottom: 1em;">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="Enter author name" value="{{ old('name', $author->name) }}">
        @error('name')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1em;">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter email" value="{{ old('email', $author->email) }}">
        @error('email')
        <div style="color: red;">{{ $message }}</div>
        @enderror
    </div>

    <div style="margin-bottom: 1em;">
        <label for="created_at">Created At</label>
        <input type="text" id="created_at" value="{{ $author->created_at->format('F d, Y') }}" disabled>
    </div>

    <div style="margin-bottom: 1em;">
        <label for="updated_at">Updated At</label>
        <input type="text" id="updated_at" value="{{ $author->updated_at->format('F d, Y') }}" disabled>
    </div>

    <div>
        <button type="submit">Update</button>
    </div>
</form>
