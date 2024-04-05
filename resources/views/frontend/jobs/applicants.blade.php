@extends('layouts.main')

@section('content')
<section class="container mx-auto p-6 font-mono">
  <div class="unit-5 overlay" style="background-image: url({{ asset('external/images/hero_2.jpg') }});">
    <div class="container text-center">
      <h1 class="mb-0" style="color: #fff; font-size: 2.5rem;">Applicants</h1>
      <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="#">Company</a> </span> <span><span class="sep m-0"> ></span> {{ Auth::user()->company->cname}}</span></p>
    </div>
  </div>

  <div class="site-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          @if (count($applicants) > 0)
          <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Age</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Score</th>
                            <th class="px-4 py-3">Details</th>
                            <th class="px-4 py-3">Acceptation</th>

                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($applicants as $user)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{ $user->name }}</p>
                                                {{-- <p class="text-xs text-gray-600">{{ $user->job }}</p> --}}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms font-semibold border">{{ $user->dob }}</td>
                                    <td class="px-4 py-3 text-xs border">
                                        @if ($user->status === 'online')
                                            <span class="bg-[#28a745] text-white py-1 px-2 rounded-full text-xs">Active</span>
                                        @else
                                            <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        @foreach ($user->videos as $video)
                                            @if ($video->user_id == $user->id)
                                                <span class="{{ $video->score > 50 ? 'text-[#28a745]' : 'text-red-500' }}">{{ $video->score }}%</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        &nbsp;<a href="{{ route('applicant_data',  $user)}}" class="btn btn-secondary btn-sm">see</a>

                                    </td>
                                    <td class="px-4 py-3 text-sm border ">
                                        <span class="bg-[#28a745] text-white py-1 px-2 rounded-full text-xs mr-2">Accept</span>
                                        <span class="bg-red-500 text-white py-1 px-2 rounded-full text-xs">Reject</span>

                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
          </div>
          @else
          <h3 class="text-center">No applicants apply your yet.</h3>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
