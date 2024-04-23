
<!--====== Start Left Sidebar Section======-->
<section id="left-sidebar-area">
  <!--   Left Sidebar  -->
        <div id="left-sidebar-section">

          
            <aside>
              <div class="left-sidebar" id="wrapper-sidebar">
                <ul>
                  <li><a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}"><i class="material-icons">home</i>Dashboard</a></li>
                  <li><a  class="{{ request()->routeIs('adminEmployers') || request()->routeIs('adminEditEmp') ? 'active' : '' }}" href="{{ url('/dashboard/employers') }}"><i class="material-icons">supervisor_account</i>Employers</a></li>
                  <li><a  class="{{request()->routeIs('adminCanTrash') || request()->routeIs('adminEditCan') || request()->routeIs('adminCandidates') ? 'active' : '' }}" href="{{ url('/dashboard/candidates') }}"><i class="material-icons">person</i>Candidates</a></li>
                  <li><a class="{{ request()->routeIs('adminEditCat') || request()->routeIs('adminCategory')? 'active' : '' }}" href="{{ route('adminCategory') }}"><i class="material-icons">format_align_center</i>Category</a></li>
                  <li><a class="{{ request()->routeIs('adminPostCreate') || request()->routeIs('adminPosts') || request()->routeIs('adminPostEdit') || request()->routeIs('adminPostShow') || request()->routeIs('adminPostTrash') ? 'active' : '' }}" href="{{ url('/dashboard/posts') }}"><i class="material-icons">collections</i>Posts</a></li>
                  <li><a class="{{  request()->routeIs('adminShow') || request()->routeIs('adminEdit') || request()->routeIs('adminJobTrash') || request()->routeIs('adminJobs') || request()->routeIs('adminEdit') || request()->routeIs('adminShow') || request()->routeIs('adminCreate')   ? 'active' : '' }}" href="{{ url('/dashboard/jobs') }}"><i class="material-icons">business_center</i>Jobs</a></li>
                  <li>
                    <a class="{{ request()->routeIs('adminvideos') || request()->routeIs('adminvideos') ? 'active' : '' }}" href="{{ route('adminvideos') }}">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" color="#ffffff" fill="none">
                                <path d="M12 20.5C13.8097 20.5 15.5451 20.3212 17.1534 19.9934C19.1623 19.5839 20.1668 19.3791 21.0834 18.2006C22 17.0221 22 15.6693 22 12.9635V11.0365C22 8.33073 22 6.97787 21.0834 5.79937C20.1668 4.62088 19.1623 4.41613 17.1534 4.00662C15.5451 3.67877 13.8097 3.5 12 3.5C10.1903 3.5 8.45489 3.67877 6.84656 4.00662C4.83766 4.41613 3.83321 4.62088 2.9166 5.79937C2 6.97787 2 8.33073 2 11.0365V12.9635C2 15.6693 2 17.0221 2.9166 18.2006C3.83321 19.3791 4.83766 19.5839 6.84656 19.9934C8.45489 20.3212 10.1903 20.5 12 20.5Z" stroke="currentColor" stroke-width="1.5" />
                                <path d="M15.9621 12.3129C15.8137 12.9187 15.0241 13.3538 13.4449 14.2241C11.7272 15.1705 10.8684 15.6438 10.1728 15.4615C9.9372 15.3997 9.7202 15.2911 9.53799 15.1438C9 14.7089 9 13.8059 9 12C9 10.1941 9 9.29112 9.53799 8.85618C9.7202 8.70886 9.9372 8.60029 10.1728 8.53854C10.8684 8.35621 11.7272 8.82945 13.4449 9.77593C15.0241 10.6462 15.8137 11.0813 15.9621 11.6871C16.0126 11.8933 16.0126 12.1067 15.9621 12.3129Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round" />
                            </svg>
                        </i>
                        Videos
                    </a>
                </li>
                

                  <li><a class="{{  request()->routeIs('dashboard.settings')   ? 'active' : '' }}" href="{{ route('dashboard.settings') }}"><i class="material-icons">settings</i>General Settings</a></li>
                  </ul>
              </div>  
            </aside>
        </div>
  <!--   Left Sidebar  -->
  </section>
<!--====== End Left Sidebar Section======-->
