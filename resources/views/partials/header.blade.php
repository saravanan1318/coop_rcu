<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="dashboard" class="d-flex align-items-center">
      <img src="/assets/img/photo.jpg" alt="" style="width: 190px">
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->
  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">
      <li class="nav-item dropdown pe-3">

          <?php
              if(Auth::user()->role >3)
              {
              $circle=\App\Models\Mtr_circle::select("circle_name")->where("id",Auth::user()->circle_id)->first();
              $region=\App\Models\Mtr_region::select("region_name")->where("id",Auth::user()->region_id)->first();
              ?>
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <span class="d-none d-md-block dropdown-toggle ps-2">{{isset($region)&& !empty($region)? $region->region_name.",":""}}{{isset($circle)&& !empty($circle)? $circle->circle_name.",":""}}{{ Auth::user()->name }}</span>
        </a><!-- End Profile Iamge Icon -->

          <?php
          }
              else{
                  ?>
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
          </a>
          <?php

              }
              ?>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6>{{ Auth::user()->name }}</h6>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="{{url('logout')}}">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
