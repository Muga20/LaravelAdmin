   <nav class="sidebar sidebar-offcanvas" id="sidebar">
       <ul class="nav">
           <li class="nav-item">
               <div class="d-flex sidebar-profile">
                   <div class="sidebar-profile-image">
                       <img src=" {{ $data->image }}" alt="image">
                       <span class="sidebar-status-indicator"></span>
                   </div>
                   <div class="sidebar-profile-name">

                       @if (isset($data))
                           <p class="sidebar-name">
                               {{ $data->name }}
                           </p>
                       @endif
                       @php
                           $currentTime = \Carbon\Carbon::now();
                           $greeting = '';
                           if ($currentTime->hour >= 5 && $currentTime->hour < 12) {
                               $greeting = 'Good Morning';
                           } elseif ($currentTime->hour >= 12 && $currentTime->hour < 18) {
                               $greeting = 'Good Afternoon';
                           } else {
                               $greeting = 'Good Evening';
                           }
                       @endphp

                       <p class="sidebar-designation">
                           {{ $greeting }}
                       </p>
                   </div>
               </div>
               <div class="nav-search">
                   <div class="input-group">
                       <input type="text" class="form-control" placeholder="Type to search..." aria-label="search"
                           aria-describedby="search">
                       <div class="input-group-append">
                           <span class="input-group-text" id="search">
                               <i class="typcn typcn-zoom"></i>
                           </span>
                       </div>
                   </div>
               </div>
               <p class="sidebar-menu-title">Dash menu</p>
           </li>
           <li class="nav-item">
               <a class="nav-link" href="/dashboard">
                   {{-- <i class="typcn typcn-device-desktop menu-icon"></i> --}}
                   <span class="menu-title"> Dashboard </span>
               </a>
           </li>
           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                   aria-controls="ui-basic">
                   {{-- <i class="typcn typcn-briefcase menu-icon"></i> --}}
                   <span class="menu-title">Category</span>
                   <i class="typcn typcn-chevron-right menu-arrow"></i>
               </a>
               <div class="collapse" id="ui-basic">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="/createCategory">Create Category</a></li>
                       <li class="nav-item"> <a class="nav-link" href="/showCategory">Show Categories</a></li>

                   </ul>
               </div>
           </li>


           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                   aria-controls="form-elements">
                   {{-- <i class="typcn typcn-film menu-icon"></i> --}}
                   <span class="menu-title">Blogs</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="form-elements">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"><a class="nav-link" href="createBlogs">Create Blog</a></li>
                       <li class="nav-item"><a class="nav-link" href="showBlogs">Show Blogs</a></li>

                   </ul>
               </div>
           </li>

           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                   {{-- <i class="typcn typcn-chart-pie-outline menu-icon"></i> --}}
                   <span class="menu-title">Products</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="charts">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="/createProduct">Create Products</a></li>
                       <li class="nav-item"> <a class="nav-link" href="/showProduct">Show Products</a></li>

                   </ul>
               </div>
           </li>


           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false" aria-controls="charts">
                   {{-- <i class="typcn typcn-chart-pie-outline menu-icon"></i> --}}
                   <span class="menu-title">Services</span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="service">
                   <ul class="nav flex-column sub-menu">
                       <li class="nav-item"> <a class="nav-link" href="/createService">Create Services</a></li>
                       <li class="nav-item"> <a class="nav-link" href="/showService">Show Services</a></li>

                   </ul>
               </div>
           </li>

           <li class="nav-item">
               <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false"
                   aria-controls="tables">
                   {{-- <i class="typcn typcn-th-small-outline menu-icon"></i> --}}
                   <span class="menu-title">Orders </span>
                   <i class="menu-arrow"></i>
               </a>
               <div class="collapse" id="tables">
                   <ul class="nav flex-column sub-menu">

                       <li class="nav-item"> <a class="nav-link" href="/showOrder">Show Orders</a></li>

                   </ul>
               </div>
           </li>

     
   </nav>
