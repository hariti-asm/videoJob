@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('File Upload') }}</div>

                <div class="card-body">
                    <form action="{{ route('video.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="file">{{ __('Select video to upload:') }}</label>
                            <input type="file" name="file" id="file" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <input type="submit" value="{{ __('Upload') }}" name="submit" class="btn btn-primary">
                        </div>

                        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
