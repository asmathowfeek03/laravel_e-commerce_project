<!-- Admin Dashboard sidebar-->

    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav" >
          <li class="nav-item" {{ Request::is('/admin/dashboard') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link"  href="{{url('/admin/dashboard')}}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" {{ Request::is('/admin/chart') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link"  href="{{url('/admin/chart')}}">
                <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Analitics</span>
            </a>
          </li>

          <li class="nav-item" {{ Request::is('/admin/orders') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link"  href="{{url('/admin/orders')}}">
                <i class="mdi mdi-cart menu-icon"></i>
              <span class="menu-title">Orders</span>
            </a>
          </li>

          <li class="nav-item" {{ Request::is('/admin/brands') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link" href="{{url('/admin/brands')}}">
                <i class="mdi mdi-label menu-icon"></i>
              <span class="menu-title">Brands</span>
            </a>
          </li>

          <li class="nav-item"  {{ Request::is('/admin/category') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link" href="{{url('/admin/category')}}">
                <i class="mdi mdi-chart-pie menu-icon"></i>
              <span class="menu-title">Categories</span>
            </a>
          </li>


          <li class="nav-item"  {{ Request::is('/admin/colors') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link" href="{{url('/admin/colors')}}">
                <i class="mdi mdi-palette menu-icon"></i>
              <span class="menu-title">Product Colors</span>
            </a>
          </li>

          <li class="nav-item"  {{ Request::is('/admin/products') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link" href="{{url('/admin/products')}}">
                <i class="mdi mdi-package-variant menu-icon"></i>
              <span class="menu-title">Products</span>
            </a>
          </li>

          <li class="nav-item"  {{ Request::is('/admin/users') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link"  href="{{url('/admin/users')}}">
                <i class="mdi mdi-account menu-icon"></i>
              <span class="menu-title">Users</span>
            </a>
          </li>

          <li class="nav-item"  {{ Request::is('/admin/sliders') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link" href="{{url('/admin/sliders')}}">
                <i class="mdi mdi-image-album menu-icon"></i>
              <span class="menu-title">Home Slider</span>
            </a>
          </li>

          <li class="nav-item"  {{ Request::is('/admin/settings') ? 'active':'' }} style="padding-top:7px;padding-bottom:7px">
            <a class="nav-link" href="{{url('/admin/settings')}}">
                <i class="mdi mdi-settings menu-icon"></i>
              <span class="menu-title">Setting</span>
            </a>
          </li>
        </ul>
    </nav>
