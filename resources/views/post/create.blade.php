{{-- halaman create data post --}}
<h1 style="text-align: center; font-weight: bold; font-size: 30px; margin-bottom: 20px;">Create Post</h1>

<div style="max-width: 500px; margin: 0 auto; padding: 20px; border-radius: 10px; background-color: #f4f4f4;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);">
    <form action="{{ route('post.store') }}" method="post">
        @csrf

        <label for="title" style="font-weight: bold; display: block; margin-bottom: 5px;">Title</label>
        <input type="text" name="title" id="title" style="width: 100%; padding: 10px; border-radius: 5px;
                border: 1px solid #ccc; margin-bottom: 10px;">
        @if ($errors->has('title'))
            <p style="color: red; font-size: 12px;">{{ $errors->first('title') }}</p>
        @endif

        <label for="description" style="font-weight: bold; display: block; margin-bottom: 5px;">Description</label>
        <textarea name="description" id="description" rows="4" style="width: 100%; padding: 10px; border-radius: 5px;
                border: 1px solid #ccc; margin-bottom: 10px;"></textarea>
        @if ($errors->has('description'))
            <p style="color: red; font-size: 12px;">{{ $errors->first('description') }}</p>
        @endif

        <label for="author" style="font-weight: bold; display: block; margin-bottom: 5px;">Author</label>
        <input type="text" name="author" id="author" style="width: 100%; padding: 10px; border-radius: 5px;
                border: 1px solid #ccc; margin-bottom: 10px;">
        @if ($errors->has('author'))
            <p style="color: red; font-size: 12px;">{{ $errors->first('author') }}</p>
        @endif

        <button type="submit" style="width: 100%; padding: 10px; background-color: #1d4adc; color: white;
                border: none; border-radius: 5px; font-size: 16px; cursor: pointer;
                transition: background 0.3s;">
            Create
        </button>
    </form>
</div>
