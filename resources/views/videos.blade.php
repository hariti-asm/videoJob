
@vite([])

@foreach($videos as $video)
    <p>Title: {{ $video->title }}</p>
    <p>Path: {{ $video->path }}</p>

    
@endforeach
