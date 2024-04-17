@extends('../admin/layouts.app')

@section('content')
@foreach($videos as $video)
<div class="flex justify-center ">

    <video controls class="w-full max-w-xl my-4 h-32 md:h-48 lg:h-56 xl:h-64">
        <source src="{{ asset($video->path) }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
@endforeach
@endsection
