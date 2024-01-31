 <!-- left sidebar -->
 <style>
     .sidebar li .submenu {
         list-style: none;
         margin: 0;
         padding: 0;
         padding-left: 1rem;
         padding-right: 1rem;
     }
 </style>
 <nav class="sidebar sidebar-offcanvas fixed-nav" id="sidebar">
     <ul class="nav">
         <li class="nav-item nav-profile">
             <div class="nav-link">
                 {{-- <div class="profile-image">
                          <img src="images/faces/face5.jpg" alt="image" />
                      </div> --}}
                 <div class="profile-name">
                     <p class="name">
                         Welcome {{session()->get('u_email')}}
                     </p>
                     {{-- <p class="designation">
                              Super Admin
                          </p> --}}
                 </div>
             </div>
         </li>
         {{--
         <!--<li class="{{ request()->is('dashboard*') ? 'nav-item active' : 'nav-item' }}">-->
         <!--    <a class="nav-link active" href="{{ route('dashboard') }}">-->
         <!--        <i class="fa fa-home menu-icon"></i>-->
         <!--        <span class="menu-title">Dashboard</span>-->
         <!--    </a>-->
         <!--</li>-->
         --}}

         <li class="nav-item">
             <a class="nav-link active" href="{{ route('project-registration') }}">
                <i class="fa fa-th-large menu-icon"></i>
               <span class="menu-title">Update Project Details</span>
                <i class="menu-arrow"></i>
            </a>
         </li>
     </ul>
 </nav>
 <!-- partial -->

 <script></script>
