


<div class="site-wrap overflow-hidden">

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class=" js-menu-toggle"> 
          <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"><path d="M5 5L12 5L19 5"><animate fill="freeze" attributeName="d" dur="0.4s" values="M5 5L12 5L19 5;M5 5L12 12L19 5"/></path><path d="M5 12H19"><animate fill="freeze" attributeName="d" dur="0.4s" values="M5 12H19;M12 12H12"/></path><path d="M5 19L12 19L19 19"><animate fill="freeze" attributeName="d" dur="0.4s" values="M5 19L12 19L19 19;M5 19L12 12L19 19"/></path></g></svg>        </span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div> <!-- .site-mobile-menu -->
  

<div class="site-navbar-wrap js-site-navbar bg-white">
      
    <div class="container">
      <div class="site-navbar bg-light">
        <div class="py-1">
          <div class="row align-items-center">
            <div class="col-2">
              <h2 class="mb-0 site-logo"><a href="/">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
            </div>
            <div class="col-10">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container pr-0">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span > <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"><path fill="black" d="M4 17.27v-1h16v1zm0-4.77v-1h16v1zm0-4.77v-1h16v1z"/></svg></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
         
                    <li class="{{ request()->routeIs('company') ? 'active' : '' }}"><a href="{{ route('company') }}">Company</a></li>
                    @if (!Auth::check())
                    <li class="{{ request()->routeIs('/register') ? 'active' : '' }}"><a href="/register">For Job Seeker</a></li>
                    <li class="{{ request()->routeIs('employer.register') ? 'active' : '' }}"><a href="{{ route('employer.register') }}">For Employees</a></li>
                    @else

                 
                        @if (Auth::user()->user_type==='employer' || Auth::user()->user_type==='seeker')
                        <li class="has-children">
                          <a href="/home">Dashboard</a>
                          
                          <ul class="dropdown arrow-top">
                            
                            @if (Auth::user()->user_type==='employer')
                            <?php echo Auth::user()->user_type?>
                            <li><a  href="{{ route('job.create') }}">
                                {{ __('Create new Job') }}
                              </a>
                            </li>
                            <li><a  href="{{ route('myjobs') }}">
                              {{ __('My Jobs') }}
                              </a>
                            </li>
                            <li><a  href="{{ route('company.create') }}">
                                {{ __('Company') }}
                              </a>
                            </li>

                            
                         
                          
                            @endif

                            @if (Auth::user()->user_type==='seeker')
                            <li><a  href="{{ route('alljobs') }}">
                                {{ __('alljobs') }}
                            </a></li>
                            <li><a  href="{{ route('home') }}">
                                {{ __('Saved Jobs') }}
                            </a></li>
                            <li><a  href="{{ route('appliedJobs') }}">
                              {{ __('Applied Jobs') }}
                          </a></li>
                          <li><a  href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a></li>
                            @endif





                          </ul>
                        </li>
                    
                        @else

                          <li><a href="/home">Dashboard</a></li>
                         
                              
                         @endif



                    @endif


                    @if (!Auth::check())
                    <li>
                      <a href="#" data-bs-target="#login-modal" data-toggle="modal" data-target="#login-modal">
                          <span class="bg-primary text-white py-3 px-3 rounded">
                              {{-- <span>
                                  <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                      <path fill="currentColor" d="m17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4z"/>
                                  </svg>
                              </span> --}}
                              Login
                          </span>
                      </a>
                  </li>
                  
                    @else
                    <li>
                      <div class="flex flex-row items-center w-full">
                          <a class="bg-primary text-white py-3 px-3 rounded " href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                  <path fill="white" d="M3 21V3h9v2H5v14h7v2zm13-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5z"/>
                              </svg> --}}
                              {{ __('LOGOUT') }}
                          </a>
                      </div>
                  </li>
                  {{-- <a href="{{route('profile.edit')}}">Account</a> --}}
                  

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                      
                          
                          @endif

                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- <div style="height: 100px;"></div> --}}


  <!-- Login Modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content pb-4">
      <div class="modal-header mt-2 mb-2">
        <h5 class="modal-title" id="login-modal">{{ __('User/Employee/Admin') }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
       
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                      
                    <div class="row mb-3">
                        <label for="email" class="col-md-12 col-form-label text-md-start">{{ __('Email Address') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-12 col-form-label text-md-start">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12 ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-12 ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Login') }}
                            </button>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
  <!-- Modal -->


  