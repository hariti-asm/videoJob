
@vite([])

@foreach($videos as $video)
    <p>Title: {{ $video->title }}</p>
    <p>Path: {{ $video->path }}</p>
    <form action="{{ route('video.transcribe', $video) }}" method="post">
        @csrf
        <button type="submit">Transcribe</button>
    </form>
    
@endforeach
