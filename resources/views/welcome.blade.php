
@include('frontend/partials.head')
@include('frontend/partials.nav')

@include('frontend/partials.hero')
@include('frontend/partials.category')




<div class="site-section bg-light overflow-hidden">
  <div class="container">
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
            @if ($job->company->logo ?? '')
            <div class="company-logo blank-logo text-center text-md-left pl-3">
                <img src="{{ asset('/uploads/logo') }}/{{ $job->company->logo  ?? ''}}" alt="Image" class="img-fluid mx-auto">
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

        <div class="flex justify-center">
          <div class="max-w-[300px]">
              <div class="col-md-12 text-center mt-5">
                  <a href="{{ route('alljobs') }}" class="btn btn-primary rounded py-3 px-5 flex items-center justify-center">
                      <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 48 48" class="mr-2">
                          <circle cx="24" cy="24" r="21" fill="white"/>
                          <g fill="#28a745">
                              <path d="M21 14h6v20h-6z"/>
                              <path d="M14 21h20v6H14z"/>
                          </g>
                      </svg>
                      Show More Jobs
                  </a>
              </div>
          </div>
      </div>
      
      
      </div>

    </div>
  </div>
</div>

{{-- @include('frontend/partials.testimonial') --}}


<div class="site-blocks-cover overlay inner-page" style="background-image: url('{{ asset('backend/external/images/hero_1.jpg') }}');" data-aos="fade" data-stellar-background-ratio="0.5">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-md-6 text-center" data-aos="fade">
        <h1 class="h3 mb-0">Your Dream Job</h1>
        <p class="h3 text-white mb-5">Is Waiting For You</p>
        <p><a href="/register" class="btn btn-outline-warning py-3 px-4">Job seeker</a> <a href="{{ route('employer.register') }}" class="btn btn-warning py-3 px-4">Employer </a></p>
        
      </div>
    </div>
  </div>
</div>



<div class="site-section site-block-feature bg-light">
  <div class="container">
    
    <div class="text-center mb-5 section-heading">
      <h2>Why Choose Us</h2>
    </div>

    <div class="d-block d-md-flex border-bottom">
      <div class="text-center p-4 item border-right" data-aos="fade">
        <div class="d-flex flex-column align-items-center justify-content-center mb-3">
            <svg class="my-3" xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 256 256">
                <path fill="#28a745" d="M256 208v-16h-16.808a39.744 39.744 0 0 0-5.856-13.968l11.92-11.92l-11.192-11.192l-11.92 11.92A39.688 39.688 0 0 0 208 134.808V118h-16v16.808a39.744 39.744 0 0 0-13.968 5.856l-11.92-11.92l-11.192 11.192l11.92 11.92A39.688 39.688 0 0 0 134.808 192H118v16h16.808c.208 1.008.608 1.832 1.168 2.592l-11.92 11.92l11.192 11.192l11.92-11.92a39.744 39.744 0 0 0 5.856 5.856l11.92 11.92l11.192-11.192l-11.92-11.92A39.688 39.688 0 0 0 239.192 208zm-56 16c-13.232 0-24-10.768-24-24s10.768-24 24-24s24 10.768 24 24s-10.768 24-24 24m-40-88h-64a16 16 0 0 1-16-16V32a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v96a16 16 0 0 1-16 16m-64-16h64V32h-64z"/>
                <path fill="#28a745" d="M136 168H64a16 16 0 0 1-16-16V56h16v96h72z"/>
                <path fill="#28a745" d="M104 200H32c-8.816 0-16-7.184-16-16V88h16v96h72z"/>
                <!-- Plus Mince -->
                <path fill="#28a745" d="M160 112H96a8 8 0 0 1 0-16h64a8 8 0 0 1 0 16z"/>
                <path fill="#28a745" d="M128 144V80a8 8 0 0 1 16 0v64a8 8 0 0 1-16 0z"/>
            </svg>
            <h2 class="h4">More Jobs Every Day</h2>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
        <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
    </div>
    
     <div class="text-center p-4 item" data-aos="fade">
    <div class="d-flex flex-column align-items-center justify-content-center mb-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
            <path fill="#28a745" d="M11.5 4a3.5 3.5 0 1 0 0 7a3.5 3.5 0 0 0 0-7M6 7.5a5.5 5.5 0 1 1 11 0a5.5 5.5 0 0 1-11 0M8 16a4 4 0 0 0-4 4h8.05v2H2v-2a6 6 0 0 1 6-6h4v2zm11.5-3.25v1.376c.715.184 1.352.56 1.854 1.072l1.193-.689l1 1.732l-1.192.688a4.008 4.008 0 0 1 0 2.142l1.192.688l-1 1.732l-1.193-.689a4 4 0 0 1-1.854 1.072v1.376h-2v-1.376a3.996 3.996 0 0 1-1.854-1.072l-1.193.689l-1-1.732l1.192-.688a4.004 4.004 0 0 1 0-2.142l-1.192-.688l1-1.732l1.193.688a3.996 3.996 0 0 1 1.854-1.071V12.75zm-2.751 4.283a1.991 1.991 0 0 0-.25.967c0 .35.091.68.25.967l.036.063a1.999 1.999 0 0 0 3.43 0l.036-.063c.159-.287.249-.616.249-.967c0-.35-.09-.68-.249-.967l-.036-.063a1.999 1.999 0 0 0-3.43 0z"/>
        </svg>
        <h2 class="h4 mt-2">Creative Jobs</h2>
    </div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
    <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
</div>
    </div>
    <div class="d-block d-md-flex">
      <div class="text-center p-4 item border-right" data-aos="fade">
          <div class="d-flex flex-column align-items-center justify-content-center mb-3">
              <svg class="my-2" xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24">
                  <g fill="none" stroke="#28a745" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                      <path d="m18 20l3.824-3.824a.6.6 0 0 0 .176-.424V10.5A1.5 1.5 0 0 0 20.5 9v0a1.5 1.5 0 0 0-1.5 1.5V15"/>
                      <path d="m18 16l.858-.858a.484.484 0 0 0 .142-.343v0a.485.485 0 0 0-.268-.433l-.443-.221a2 2 0 0 0-2.308.374l-.895.895a2 2 0 0 0-.586 1.414V20"/>
                      <path d="M6 20l-3.824-3.824A.6.6 0 0 1 2 15.752V10.5A1.5 1.5 0 0 1 3.5 9v0A1.5 1.5 0 0 1 5 10.5V15"/>
                      <path d="m6 16l-.858-.858A.485.485 0 0 1 5 14.799v0c0-.183.104-.35.268-.433l.443-.221a2 2 0 0 1 2.308.374l.895.895a2 2 0 0 1 .586 1.414V20"/>
                      <path d="m10.167 8h-3.334V9.667H8V6.333h2.333V4h3.334v2.333H16v3.334h-2.333z"/>
                  </g>
              </svg>
              <h2 class="h4">Healthcare</h2>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
          <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
      </div>
      <div class="text-center p-4 item" data-aos="fade">
          <div class="d-flex flex-column align-items-center justify-content-center mb-3">
              <svg class="my-3" xmlns="http://www.w3.org/2000/svg" width="4em" height="4em" viewBox="0 0 24 24">
                  <path fill="#28a745" d="m6 16.5l-3 2.94V11h3m5 3.66l-1.57-1.34L8 14.64V7h3m5 6l-3 3V3h3m2.81 9.81L17 11h5v5l-1.79-1.79L13 21.36l-3.47-3.02L5.75 22H3l6.47-6.34L13 18.64"/>
              </svg>
              <h2 class="h4">Finance &amp; Accounting</h2>
          </div>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati reprehenderit explicabo quos fugit vitae dolorum.</p>
          <p><a href="#">Read More <span class="icon-arrow-right small"></span></a></p>
      </div>
  </div>
  
  </div>
</div>






@include('frontend/partials.blog')


@include('frontend/partials.footer')
