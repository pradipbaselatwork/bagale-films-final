  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/admin_images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(Auth::guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image">
          {{-- <img src="{{asset($data->image)}}" alt="" width="100" height="100" srcset=""> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            @if(Session::get('page')=="dashboard")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
          <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ $active}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>


            {{-- Sidebar Menu of Team--}}
            @if(Session::get('page')=="banner"
            || Session::get('page')=="uploadvideo"
            || Session::get('page')=="playlist"
            || Session::get('page')=="pbanner")
  
            <?php $menuOpen = "menu-open";
             $active = "active" ?>
            @else
            <?php $menuOpen = ""; $active = ""?>
            @endif
            <li class="nav-item has-treeview  {{ $menuOpen }} ">
              <a href="#" class="nav-link {{ $active}}">
                <i class="nav-icon fas fa-th"></i>
                <p>
                  Banners
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                @if(Session::get('page')=="banner")
                   <?php $active = "active"; ?>
                   @else
                   <?php $active = ""; ?>
                   @endif
                <li class="nav-item">
                  <a href="{{ route('admin.banner') }}" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Banner</p>
                  </a>
                </li>
              </ul>
  
              <ul class="nav nav-treeview">
                @if(Session::get('page')=="uploadvideo")
                   <?php $active = "active"; ?>
                   @else
                   <?php $active = ""; ?>
                   @endif
                <li class="nav-item">
                  <a href="{{ route('admin.uploadvideo') }}" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Upload Video</p>
                  </a>
                </li>
              </ul>
  
              <ul class="nav nav-treeview">
                @if(Session::get('page')=="pbanner")
                   <?php $active = "active"; ?>
                   @else
                   <?php $active = ""; ?>
                   @endif
                <li class="nav-item">
                  <a href="{{ route('admin.pbanner') }}" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Playlist Banner</p>
                  </a>
                </li>
              </ul>
              
              <ul class="nav nav-treeview">
                @if(Session::get('page')=="playlist")
                   <?php $active = "active"; ?>
                   @else
                   <?php $active = ""; ?>
                   @endif
                <li class="nav-item">
                  <a href="{{ route('admin.playlist') }}" class="nav-link {{ $active}}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Playlist</p>
                  </a>
                </li>
              </ul>

      
  
            </li>

                      
          {{-- Sidebar Banner Menu--}}
          @if(Session::get('page')=="teamslider"
          ||Session::get('page')=="team")

          <?php $menuOpen = "menu-open";
           $active = "active" ?>
          @else
          <?php $menuOpen = ""; $active = ""?>
          @endif
          <li class="nav-item has-treeview  {{ $menuOpen }} ">
            <a href="#" class="nav-link {{ $active}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Our Team
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              @if(Session::get('page')=="teamslider")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.teamslider') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team Slider</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="team")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.team') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Team</p>
                </a>
              </li>
            </ul>

          </li>



            
          @if(Session::get('page')=="settings" || Session::get('page')=="update-admin-details")
          <?php $menuOpen = "menu-open";
          $active = "active" ?>
         @else
         <?php $menuOpen = ""; $active = ""?>
         @endif
         
         <li class="nav-item has-treeview  {{ $menuOpen }} ">
           <a href="#" class="nav-link {{ $active}}">
       <i class="nav-icon fas fa-th"></i>
       <p>
         Settings
         <i class="right fas fa-angle-left"></i>
       </p>
     </a>

     <ul class="nav nav-treeview">
       @if(Session::get('page')=="settings")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
       <li class="nav-item">
         <a href="{{ url('admin/settings') }}" class="nav-link {{ $active}}">
           <i class="far fa-circle nav-icon"></i>
           <p>Update Admin Password</p>
         </a>
       </li>
       @if(Session::get('page')=="update-admin-details")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
       <li class="nav-item">
         <a href="{{ url('admin/update-admin-details') }}" class="nav-link {{ $active}}">
           <i class="far fa-circle nav-icon"></i>
           <p>Update Admin Details</p>
         </a>
       </li>
     </ul>
   </li>
   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>