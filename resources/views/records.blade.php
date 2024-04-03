@extends('layouts.main')

@section('content')
<div style="height:150px"></div>
<div class="container">
    <div class="row justify-content-center mb-12">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('File Upload') }}</div>
                <div class="card-body">
                    <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="file">{{ __('Select video to upload:') }}</label>
                        <input type="file" name="file" id="file" class="form-control-file">
                        <input type="submit" value="{{ __('Upload') }}" name="submit" class="bg-[#28a745]  hover:bg-[#28a745] text-white font-bold py-1 px-6 my-2  rounded">
                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('success'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
</div>
@endsection
