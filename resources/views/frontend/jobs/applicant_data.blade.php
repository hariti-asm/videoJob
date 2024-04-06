@extends('layouts.main')

@section('content')
<section class="container mx-auto p-6 font-mono">
    <div class="unit-5 overlay" style="background-image: url({{ asset('../external/images/hero_2.jpg') }});">
        <div class="container text-center">
            <h1 class="mb-0" style="color: #fff; font-size: 2.5rem;">Applicant Video Details</h1>
        </div>
    </div>
{{-- tag --}}
    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="p-4 bg-white">
                            <h2 class="text-2xl font-bold mb-4">Video Transcript</h2>
                            @foreach ($applicant as $video)
                                <p class="text-gray-800">{{ $video->transcript }}</p>
                                <video controls class="w-full my-4">
                                    <source src="{{ asset($video->path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                                <h2 class="text-2xl font-bold mb-4">Summary</h2>
                                <p class="text-gray-800">{{ $video->summary }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
