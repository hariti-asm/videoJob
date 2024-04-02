@extends('layouts.main')

@section('content')
<div class="flex justify-center items-center h-screen ">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($videos as $video)
        <div class="relative">
            <video controls class="w-full h-auto rounded-lg">
                <source src="{{ $video->path }}" type="video/mp4">
            </video>
            <p class="text-center mt-2">{{ $video->title }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection
