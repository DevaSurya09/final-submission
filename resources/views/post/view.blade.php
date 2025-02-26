<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
<h1 style="text-align: center;font-weight: bold; margin: 0; font-size: 70px;">DATA BUKU</h1>

<center>
<a style="background-color: #1d4adc; color: white; padding:  4px 8px; border: none; border-radius: 5px;
                                cursor: pointer; display: inline-block; font-size: 20px;" href="{{ route('post.create') }}">Tambah Postingan</a><br>
</center>

        <center>

            @foreach ($post as $postingan)
        <div style="width: 300px; background-color: #1e1e1e; color: white; border-radius: 10px; overflow: hidden;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); font-family: Arial, sans-serif;
                    display: inline-block; margin: 10px;">
            <img src="{{ asset('noImage.png') }}" style="width: auto;">
            <div style="padding: 15px;">
                <h2 style="text-align: center; margin: 0; font-size: 18px;">{{ $postingan->title }}</h2>
                <hr>
                <p style="font-size: 14px; color: #ccc;">{{ Str::limit($postingan->description, 100)}}</p>
                <hr>
                <p style="font-size: 14px; color: #ccc;">Author : {{ $postingan->author }}</p>
                <hr>
                <div style="display: flex; gap: 10px; justify-content: center; align-items: center; margin-top: 3px;">
                    <a href="{{ route('post.edit', $postingan->id) }}" style="background-color: #4CAF50; color: white; padding: 4px 8px;
                              border-radius: 5px; text-decoration: none; display: inline-block;">
                        Edit
                    </a>
                    <form action="{{ route('post.destroy', $postingan->id) }}" method="post" style="margin: 0; display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakinnnn????')"
                                style="background-color: #d9534f; color: white; padding:  4px 8px; border: none; border-radius: 5px;
                                cursor: pointer; display: inline-block;">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    @endforeach
        </center>
