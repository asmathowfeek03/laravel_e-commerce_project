<!-- Admin Dashboard top navbar -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <!--Profile page link-->
        <div class="navbar-brand-wrapper d-flex justify-content-center">
            <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100" style="padding-bottom:6px;padding-left:30px">
                <x-app-layout>
                </x-app-layout>
            </div>
        </div>

        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav mr-lg-4 w-100">
                <!--Welcome Message-->
                <li class="nav-item nav-profile dropdown">
                    <span class="nav-profile-name" style="font-size:15px; color:rgb(0, 0, 0); font-weight:bold">Hello,  {{Auth::user()->name}} !</span>
                </li>
                <!--Search bar-->
                <li class="nav-item nav-search d-none d-lg-block w-100">
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control" placeholder="Search now" aria-label="search" aria-describedby="search">
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown me-4">
                    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center notification-dropdown">
                        <i class="mdi mdi-cog "></i>
                    <span class="count"></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

