@extends('../admin/layouts.app')

@section('content')
<div class="container mx-auto">
    <table class="table-auto">
        <thead>
            <tr>
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Video</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)
            <tr>
                <td class="border px-4 py-2">{{ $video->title }}</td>
                <td class="border px-4 py-2">
                    <div class="w-48 h-36 md:w-64 md:h-48 lg:w-72 lg:h-56 xl:w-80 xl:h-64">
                        <video controls class=" rounded-lg">
                            <source src="{{ asset($video->path) }}" type="video/mp4">
                        </video>
                    </div>
                </td>
                <td class="border px-4 py-2">
                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
