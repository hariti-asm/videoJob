@extends('layouts.main')

@section('content')


<div style="height: 94px;"></div>

<div class="unit-5 overlay" style="background-image: url({{ asset('backend/external/images/hero_2.jpg') }});">
  <div class="container text-center">
    <h1 class="mb-0" style="    color: #fff;
    font-size: 2.5rem;">All Jobs</h1>
    <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span> Jobs</span></p>
  </div>
</div>


<div class="site-section bg-light">
    <div class="container">
      <div class="row mb-3">
        <div class="col-lg-12">
          <search-component></search-component>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
          <h2 class="mb-5 h3">Recent Jobs</h2>
          <div class="rounded border jobs-wrap">

        
            @foreach ($jobs as $job)
          

            <a href="{{ route('job.show', [$job->id, $job->slug]) }}" class="job-item d-block d-md-flex align-items-center  border-bottom  
              
              @if($job->type =='fulltime')         
              fulltime
              @elseif($job->type =='freelance') 
              freelance  
              @elseif($job->type =='partime')   
              partime  
              @elseif($job->type =='remote')   
              remote
              @endif

              ">
              @if ($job->company->logo)
              <div class="company-logo blank-logo text-center text-md-left pl-3">
                <img src="{{ url('/storage/logos/' . $job->company->logo) }}" alt="Image" class="img-fluid mx-auto">


              </div>
              @endif
              <div class="job-details h-100">
                <div class="p-3 align-self-center">
                  <h3>{{ $job->title }}</h3>
                  <div class="d-block d-lg-flex">
                      <div class="mr-3 d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                              <path fill="none" stroke="#718096" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 9v20h22V9Zm5 0s0-6 6-6s6 6 6 6"/>
                          </svg>
                          <span class="ml-2">{{ Str::limit($job->position, 20)}}</span>
                      </div>
                      <div class="mr-3 d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                              <path fill="#9b9797" d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"/></svg>
                          <span class="ml-2">{{ Str::limit($job->address, 20)}}</span>
                      </div>
                      <div class="d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 36 36">
                              <path fill="#718096" d="M32 8H4a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h28a2 2 0 0 0 2-2V10a2 2 0 0 0-2-2m0 6a4.25 4.25 0 0 1-3.9-4H32Zm0 1.62v4.83A5.87 5.87 0 0 0 26.49 26h-17A5.87 5.87 0 0 0 4 20.44V15.6A5.87 5.87 0 0 0 9.51 10h17A5.87 5.87 0 0 0 32 15.6ZM7.9 10A4.25 4.25 0 0 1 4 14v-4ZM4 22.06A4.25 4.25 0 0 1 7.9 26H4ZM28.1 26a4.25 4.25 0 0 1 3.9-3.94V26Z" class="clr-i-outline clr-i-outline-path-1"/>
                              <path fill="#718096" d="M18 10.85c-3.47 0-6.3 3.21-6.3 7.15s2.83 7.15 6.3 7.15s6.3-3.21 6.3-7.15s-2.83-7.15-6.3-7.15m0 12.69c-2.59 0-4.7-2.49-4.7-5.55s2.11-5.55 4.7-5.55s4.7 2.49 4.7 5.55s-2.11 5.56-4.7 5.56Z" class="clr-i-outline clr-i-outline-path-2"/>
                              <path fill="none" d="M0 0h36v36H0z"/>
                          </svg>
                          <span class="ml-2">${{ $job->salary }}</span>
                      </div>
                  </div>
              </div>
              
              </div>
              <div class="job-category align-self-center">
                <div class="p-3">
                  <span class=" p-2 rounded border 

                  @if($job->type =='fulltime')         
                  text-info  border-info
                  @elseif($job->type =='freelance') 
                  text-warning   border-warning
                  @elseif($job->type =='partime')   
                  text-danger   border-danger
                  
                  @elseif($job->type =='remote')   
                  text-dark   border-dark
                  @endif
                  
                  ">{{  Str::ucfirst($job->type)}}</span>
                </div>
              </div>  
            </a>


            @endforeach




          </div>

          <div class="col-md-12 text-center mt-5">
            {{ $jobs->links() }}
          </div>
        </div>
  
      </div>
    </div>
  </div>








@endsection

