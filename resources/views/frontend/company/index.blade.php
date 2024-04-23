@extends('layouts.main')

@section('content')

<div style="height: 95px;"></div>
<div class="unit-5 overlay" style="background-image: url('/storage/banners/{{ $company->banner }}');">
  <div class="container text-center">
      <h1 class="mb-0" style="    color: #fff;
      font-size: 2.5rem;">Company name:<strong>&nbsp;{{ $company->cname }}</strong></h1>
      <p class="mb-0 unit-6"><a href="/">Home</a> <span class="sep"> > <a href="{{ route('alljobs') }}">Jobs</a> </span> <span><span class="sep m-0"> ></span> Company details</span></p>
    </div>
</div>
  


<div class="site-section bg-light">
    <div class="container">
      <div class="row">
     
        <div class="col-md-12 col-lg-12 mb-5">
        
          
        
          <div class="p-4 bg-white">
  
            <div class="mb-4 mb-md-4 mr-5">
             <div class="job-post-item-header">
                <div class="d-flex align-items-center">
                    @if ($company->logo)
                    
                    <img src="{{ url('/storage/logos/' . $company->logo) }}" style="width:100px; height:100px; border-radius:100px; object-fit:cover;" class="border mb-3" alt="">

                    @endif
        
                    <h3 class="mx-4 mb-0">Company name:<strong>&nbsp;{{ $company->cname }}</strong> </h3>

                </div>
                <p class="mt-3"><strong>Company Details:</strong> &nbsp;{{ $company->description }}</p>
                <p><strong>Slogan:</strong>&nbsp;{{ $company->slogan }}</p>
                <p><strong>Address:</strong>&nbsp;{{ $company->address }}</p>
                <p><strong>Phone:</strong>&nbsp;{{ $company->phone }}</p>
                <p><strong>Website: </strong>&nbsp;<a target="_blank" href="{{ $company->website }}">{{ $company->website }}</a></p>
               
             </div>
        
            </div>
  
          </div>
        </div>
  

      </div>

      @if (count($company->jobs)> 0)
        
     
      <div class="row">
     
        <div class="col-md-12 mb-5 mb-md-0" data-aos="fade-up" data-aos-delay="100">
            <div class="p-4 bg-white">
            <h3 class="mb-5 h3">{{ $company->cname }} <i style="color: #28a745;" class="icon-hand-o-right"></i> other Jobs</h3>
            <div class="rounded border jobs-wrap">
  
          
              @foreach ($company->jobs as $job)
            
  
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
                  <img src="{{ asset('/uploads/logo') }}/{{ $job->company->logo }}" alt="Image" class="img-fluid mx-auto">
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
                    <div class="mr-3 d-flex align-items-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><circle cx="12" cy="12" r="8.5"/><path stroke-linecap="round" d="M16.5 12h-4.25a.25.25 0 0 1-.25-.25V8.5"/></g></svg>
                      <span class="ml-2"> {{ $job->created_at->diffForHumans() }}</span>
                  </div> 
                    
                    </div>
                  </div>
                </div>
                <div class="job-category align-self-center">
                  <div class="p-3">
                    
                    <span class="text-info p-2 rounded border border-info">Apply Job</span>
                  </div>
                </div>  
              </a>
  
  
              @endforeach
  
  
  
  
            </div>
          </div>
        </div>

      </div>
      @endif




    </div>
  </div>
  




@endsection
