@extends('layouts.master')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <div class="card info-card sales-card">
            <div class="card-body">
                <div class="col-12">
                    @if(isset($regions))
                        <table id="data-table-dashboard">

                            <thead>
                            <tr><th colspan="6"><center>Details of Societies logged in the portal</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Region</th>
                                <th>Total No of society</th>
                                <th>No.of society logged in portal</th>
                                <th>Not logged in the portal</th>
                                <th>% of shortfall </th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php
                                $tmp=0
                                ?>
                            @foreach($regions as $region)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$region->Region_Name}}</td>
                                    <td>{{$region->total_no_of_society}}</td>
                                    <td>{{$region->logged_socities}}</td>
                                    <td><a href="{{ URL::current() }}?Region={{$region->Region_ID}}">{{$region->total_no_of_society-$region->logged_socities}}</a></td>
                                    <td>{{number_format(100-(($region->logged_socities/$region->total_no_of_society)*100),2,'.',',')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($circles))
                        <table id="data-table-dashboard">

                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>circles</th>
                                <th>Total No of society</th>
                                <th>No.of society logged in portal</th>
                                <th>Not logged in the portal</th>
                                <th>% of shortfall </th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php
                                $tmp=0
                                ?>
                            @foreach($circles as $circle)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$circle->circleName}}</td>
                                    <td>{{$circle->total_no_of_society}}</td>
                                    <td>{{$circle->counts}}</td>
                                    <td><a href="{{ URL::current() }}?circle={{$circle->circleID}}&Region={{$disrict}}">{{$circle->total_no_of_society-$circle->counts}}</a></td>
                                    <td>{{number_format(100-(($circle->counts/$circle->total_no_of_society)*100),2,'.',',')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($societies))
                        <table id="data-table-dashboard">

                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>circles</th>
                                <th>Logged in Time</th>
                                <th>No.of society logged in portal</th>
                                <th>Not logged in the portal</th>
                                <th>% of shortfall </th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php
                                $tmp=0
                                ?>
                            @foreach($societies as $society)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$society->societyName}}</td>
                                    <td>{{!empty($society->societyLoginTime)?date( "d-m-y h:i",strtotime($society->societyLoginTime)):"-"}}</td>
                                    <td>{{$society->societycount}}</td>
                                    <td>{{1-$circle->societycount}}</td>
                                    <td>{{number_format(((1-$society->societycount)*100),2,'.',',')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                </div>
            </div>
        </div>

        {{--  <section class="section dashboard">--}}
        {{--    <div class="row">--}}

        {{--      <!-- Left side columns -->--}}
        {{--      <div class="col-lg-8">--}}
        {{--        <div class="row">--}}

        {{--          <!-- Sales Card -->--}}
        {{--          <div class="col-xxl-4 col-md-6">--}}
        {{--            <div class="card info-card sales-card">--}}

        {{--              <div class="filter">--}}
        {{--                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--                  <li class="dropdown-header text-start">--}}
        {{--                    <h6>Filter</h6>--}}
        {{--                  </li>--}}

        {{--                  <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--                </ul>--}}
        {{--              </div>--}}

        {{--              <div class="card-body">--}}
        {{--                <h5 class="card-title">Sales <span>| Today</span></h5>--}}

        {{--                <div class="d-flex align-items-center">--}}
        {{--                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">--}}
        {{--                    <i class="bi bi-cart"></i>--}}
        {{--                  </div>--}}
        {{--                  <div class="ps-3">--}}
        {{--                    <h6>145</h6>--}}
        {{--                    <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>--}}

        {{--                  </div>--}}
        {{--                </div>--}}
        {{--              </div>--}}

        {{--            </div>--}}
        {{--          </div><!-- End Sales Card -->--}}

        {{--          <!-- Revenue Card -->--}}
        {{--          <div class="col-xxl-4 col-md-6">--}}
        {{--            <div class="card info-card revenue-card">--}}

        {{--              <div class="filter">--}}
        {{--                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--                  <li class="dropdown-header text-start">--}}
        {{--                    <h6>Filter</h6>--}}
        {{--                  </li>--}}

        {{--                  <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--                </ul>--}}
        {{--              </div>--}}

        {{--              <div class="card-body">--}}
        {{--                <h5 class="card-title">Revenue <span>| This Month</span></h5>--}}

        {{--                <div class="d-flex align-items-center">--}}
        {{--                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">--}}
        {{--                    <i class="bi bi-currency-rupee"></i>--}}
        {{--                  </div>--}}
        {{--                  <div class="ps-3">--}}
        {{--                    <h6>Rs. 3,264</h6>--}}
        {{--                    <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>--}}
        {{--                  </div>--}}
        {{--                </div>--}}
        {{--              </div>--}}

        {{--            </div>--}}
        {{--          </div><!-- End Revenue Card -->--}}

        {{--          <!-- Customers Card -->--}}
        {{--          <div class="col-xxl-4 col-xl-12">--}}

        {{--            <div class="card info-card customers-card">--}}

        {{--              <div class="filter">--}}
        {{--                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--                  <li class="dropdown-header text-start">--}}
        {{--                    <h6>Filter</h6>--}}
        {{--                  </li>--}}

        {{--                  <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--                </ul>--}}
        {{--              </div>--}}

        {{--              <div class="card-body">--}}
        {{--                <h5 class="card-title">Customers <span>| This Year</span></h5>--}}

        {{--                <div class="d-flex align-items-center">--}}
        {{--                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">--}}
        {{--                    <i class="bi bi-people"></i>--}}
        {{--                  </div>--}}
        {{--                  <div class="ps-3">--}}
        {{--                    <h6>1244</h6>--}}
        {{--                    <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>--}}

        {{--                  </div>--}}
        {{--                </div>--}}

        {{--              </div>--}}
        {{--            </div>--}}

        {{--          </div><!-- End Customers Card -->--}}

        {{--          <!-- Reports -->--}}
        {{--          <div class="col-12">--}}
        {{--            <div class="card">--}}

        {{--              <div class="filter">--}}
        {{--                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--                  <li class="dropdown-header text-start">--}}
        {{--                    <h6>Filter</h6>--}}
        {{--                  </li>--}}

        {{--                  <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--                </ul>--}}
        {{--              </div>--}}

        {{--              <div class="card-body">--}}
        {{--                <h5 class="card-title">Reports <span>/Today</span></h5>--}}

        {{--                <!-- Line Chart -->--}}
        {{--                <div id="reportsChart"></div>--}}

        {{--                <script>--}}
        {{--                  document.addEventListener("DOMContentLoaded", () => {--}}
        {{--                    new ApexCharts(document.querySelector("#reportsChart"), {--}}
        {{--                      series: [{--}}
        {{--                        name: 'Sales',--}}
        {{--                        data: [31, 40, 28, 51, 42, 82, 56],--}}
        {{--                      }, {--}}
        {{--                        name: 'Revenue',--}}
        {{--                        data: [11, 32, 45, 32, 34, 52, 41]--}}
        {{--                      }, {--}}
        {{--                        name: 'Customers',--}}
        {{--                        data: [15, 11, 32, 18, 9, 24, 11]--}}
        {{--                      }],--}}
        {{--                      chart: {--}}
        {{--                        height: 350,--}}
        {{--                        type: 'area',--}}
        {{--                        toolbar: {--}}
        {{--                          show: false--}}
        {{--                        },--}}
        {{--                      },--}}
        {{--                      markers: {--}}
        {{--                        size: 4--}}
        {{--                      },--}}
        {{--                      colors: ['#4154f1', '#2eca6a', '#ff771d'],--}}
        {{--                      fill: {--}}
        {{--                        type: "gradient",--}}
        {{--                        gradient: {--}}
        {{--                          shadeIntensity: 1,--}}
        {{--                          opacityFrom: 0.3,--}}
        {{--                          opacityTo: 0.4,--}}
        {{--                          stops: [0, 90, 100]--}}
        {{--                        }--}}
        {{--                      },--}}
        {{--                      dataLabels: {--}}
        {{--                        enabled: false--}}
        {{--                      },--}}
        {{--                      stroke: {--}}
        {{--                        curve: 'smooth',--}}
        {{--                        width: 2--}}
        {{--                      },--}}
        {{--                      xaxis: {--}}
        {{--                        type: 'datetime',--}}
        {{--                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]--}}
        {{--                      },--}}
        {{--                      tooltip: {--}}
        {{--                        x: {--}}
        {{--                          format: 'dd/MM/yy HH:mm'--}}
        {{--                        },--}}
        {{--                      }--}}
        {{--                    }).render();--}}
        {{--                  });--}}
        {{--                </script>--}}
        {{--                <!-- End Line Chart -->--}}

        {{--              </div>--}}

        {{--            </div>--}}
        {{--          </div><!-- End Reports -->--}}

        {{--          <!-- Recent Sales -->--}}
        {{--          <div class="col-12">--}}
        {{--            <div class="card recent-sales overflow-auto">--}}

        {{--              <div class="filter">--}}
        {{--                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--                  <li class="dropdown-header text-start">--}}
        {{--                    <h6>Filter</h6>--}}
        {{--                  </li>--}}

        {{--                  <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--                </ul>--}}
        {{--              </div>--}}

        {{--              <div class="card-body">--}}
        {{--                <h5 class="card-title">Recent Sales <span>| Today</span></h5>--}}

        {{--                <table class="table table-borderless datatable">--}}
        {{--                  <thead>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="col">#</th>--}}
        {{--                      <th scope="col">Customer</th>--}}
        {{--                      <th scope="col">Product</th>--}}
        {{--                      <th scope="col">Price</th>--}}
        {{--                      <th scope="col">Status</th>--}}
        {{--                    </tr>--}}
        {{--                  </thead>--}}
        {{--                  <tbody>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#">#2457</a></th>--}}
        {{--                      <td>Brandon Jacob</td>--}}
        {{--                      <td><a href="#" class="text-primary">At praesentium minu</a></td>--}}
        {{--                      <td>Rs.64</td>--}}
        {{--                      <td><span class="badge bg-success">Approved</span></td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#">#2147</a></th>--}}
        {{--                      <td>Bridie Kessler</td>--}}
        {{--                      <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>--}}
        {{--                      <td>Rs.47</td>--}}
        {{--                      <td><span class="badge bg-warning">Pending</span></td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#">#2049</a></th>--}}
        {{--                      <td>Ashleigh Langosh</td>--}}
        {{--                      <td><a href="#" class="text-primary">At recusandae consectetur</a></td>--}}
        {{--                      <td>Rs.147</td>--}}
        {{--                      <td><span class="badge bg-success">Approved</span></td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#">#2644</a></th>--}}
        {{--                      <td>Angus Grady</td>--}}
        {{--                      <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>--}}
        {{--                      <td>Rs.67</td>--}}
        {{--                      <td><span class="badge bg-danger">Rejected</span></td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#">#2644</a></th>--}}
        {{--                      <td>Raheem Lehner</td>--}}
        {{--                      <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>--}}
        {{--                      <td>Rs.165</td>--}}
        {{--                      <td><span class="badge bg-success">Approved</span></td>--}}
        {{--                    </tr>--}}
        {{--                  </tbody>--}}
        {{--                </table>--}}

        {{--              </div>--}}

        {{--            </div>--}}
        {{--          </div><!-- End Recent Sales -->--}}

        {{--          <!-- Top Selling -->--}}
        {{--          <div class="col-12">--}}
        {{--            <div class="card top-selling overflow-auto">--}}

        {{--              <div class="filter">--}}
        {{--                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--                  <li class="dropdown-header text-start">--}}
        {{--                    <h6>Filter</h6>--}}
        {{--                  </li>--}}

        {{--                  <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--                  <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--                </ul>--}}
        {{--              </div>--}}

        {{--              <div class="card-body pb-0">--}}
        {{--                <h5 class="card-title">Top Selling <span>| Today</span></h5>--}}

        {{--                <table class="table table-borderless">--}}
        {{--                  <thead>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="col">Preview</th>--}}
        {{--                      <th scope="col">Product</th>--}}
        {{--                      <th scope="col">Price</th>--}}
        {{--                      <th scope="col">Sold</th>--}}
        {{--                      <th scope="col">Revenue</th>--}}
        {{--                    </tr>--}}
        {{--                  </thead>--}}
        {{--                  <tbody>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>--}}
        {{--                      <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>--}}
        {{--                      <td>Rs.64</td>--}}
        {{--                      <td class="fw-bold">124</td>--}}
        {{--                      <td>Rs.5,828</td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>--}}
        {{--                      <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>--}}
        {{--                      <td>Rs.46</td>--}}
        {{--                      <td class="fw-bold">98</td>--}}
        {{--                      <td>Rs.4,508</td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>--}}
        {{--                      <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>--}}
        {{--                      <td>Rs.59</td>--}}
        {{--                      <td class="fw-bold">74</td>--}}
        {{--                      <td>Rs.4,366</td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>--}}
        {{--                      <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>--}}
        {{--                      <td>Rs.32</td>--}}
        {{--                      <td class="fw-bold">63</td>--}}
        {{--                      <td>Rs.2,016</td>--}}
        {{--                    </tr>--}}
        {{--                    <tr>--}}
        {{--                      <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>--}}
        {{--                      <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>--}}
        {{--                      <td>Rs.79</td>--}}
        {{--                      <td class="fw-bold">41</td>--}}
        {{--                      <td>Rs.3,239</td>--}}
        {{--                    </tr>--}}
        {{--                  </tbody>--}}
        {{--                </table>--}}

        {{--              </div>--}}

        {{--            </div>--}}
        {{--          </div><!-- End Top Selling -->--}}

        {{--        </div>--}}
        {{--      </div><!-- End Left side columns -->--}}

        {{--      <!-- Right side columns -->--}}
        {{--      <div class="col-lg-4">--}}

        {{--        <!-- Budget Report -->--}}
        {{--        <div class="card">--}}
        {{--          <div class="filter">--}}
        {{--            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--              <li class="dropdown-header text-start">--}}
        {{--                <h6>Filter</h6>--}}
        {{--              </li>--}}

        {{--              <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--              <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--              <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--            </ul>--}}
        {{--          </div>--}}

        {{--          <div class="card-body pb-0">--}}
        {{--            <h5 class="card-title">Budget Report <span>| This Month</span></h5>--}}

        {{--            <div id="budgetChart" style="min-height: 400px;" class="echart"></div>--}}

        {{--            <script>--}}
        {{--              document.addEventListener("DOMContentLoaded", () => {--}}
        {{--                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({--}}
        {{--                  legend: {--}}
        {{--                    data: ['Allocated Budget', 'Actual Spending']--}}
        {{--                  },--}}
        {{--                  radar: {--}}
        {{--                    // shape: 'circle',--}}
        {{--                    indicator: [{--}}
        {{--                        name: 'Sales',--}}
        {{--                        max: 6500--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        name: 'Administration',--}}
        {{--                        max: 16000--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        name: 'Information Technology',--}}
        {{--                        max: 30000--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        name: 'Customer Support',--}}
        {{--                        max: 38000--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        name: 'Development',--}}
        {{--                        max: 52000--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        name: 'Marketing',--}}
        {{--                        max: 25000--}}
        {{--                      }--}}
        {{--                    ]--}}
        {{--                  },--}}
        {{--                  series: [{--}}
        {{--                    name: 'Budget vs spending',--}}
        {{--                    type: 'radar',--}}
        {{--                    data: [{--}}
        {{--                        value: [4200, 3000, 20000, 35000, 50000, 18000],--}}
        {{--                        name: 'Allocated Budget'--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        value: [5000, 14000, 28000, 26000, 42000, 21000],--}}
        {{--                        name: 'Actual Spending'--}}
        {{--                      }--}}
        {{--                    ]--}}
        {{--                  }]--}}
        {{--                });--}}
        {{--              });--}}
        {{--            </script>--}}

        {{--          </div>--}}
        {{--        </div><!-- End Budget Report -->--}}

        {{--        <!-- Website Traffic -->--}}
        {{--        <div class="card">--}}
        {{--          <div class="filter">--}}
        {{--            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>--}}
        {{--            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">--}}
        {{--              <li class="dropdown-header text-start">--}}
        {{--                <h6>Filter</h6>--}}
        {{--              </li>--}}

        {{--              <li><a class="dropdown-item" href="#">Today</a></li>--}}
        {{--              <li><a class="dropdown-item" href="#">This Month</a></li>--}}
        {{--              <li><a class="dropdown-item" href="#">This Year</a></li>--}}
        {{--            </ul>--}}
        {{--          </div>--}}

        {{--          <div class="card-body pb-0">--}}
        {{--            <h5 class="card-title">Website Traffic <span>| Today</span></h5>--}}

        {{--            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>--}}

        {{--            <script>--}}
        {{--              document.addEventListener("DOMContentLoaded", () => {--}}
        {{--                echarts.init(document.querySelector("#trafficChart")).setOption({--}}
        {{--                  tooltip: {--}}
        {{--                    trigger: 'item'--}}
        {{--                  },--}}
        {{--                  legend: {--}}
        {{--                    top: '5%',--}}
        {{--                    left: 'center'--}}
        {{--                  },--}}
        {{--                  series: [{--}}
        {{--                    name: 'Access From',--}}
        {{--                    type: 'pie',--}}
        {{--                    radius: ['40%', '70%'],--}}
        {{--                    avoidLabelOverlap: false,--}}
        {{--                    label: {--}}
        {{--                      show: false,--}}
        {{--                      position: 'center'--}}
        {{--                    },--}}
        {{--                    emphasis: {--}}
        {{--                      label: {--}}
        {{--                        show: true,--}}
        {{--                        fontSize: '18',--}}
        {{--                        fontWeight: 'bold'--}}
        {{--                      }--}}
        {{--                    },--}}
        {{--                    labelLine: {--}}
        {{--                      show: false--}}
        {{--                    },--}}
        {{--                    data: [{--}}
        {{--                        value: 1048,--}}
        {{--                        name: 'Search Engine'--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        value: 735,--}}
        {{--                        name: 'Direct'--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        value: 580,--}}
        {{--                        name: 'Email'--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        value: 484,--}}
        {{--                        name: 'Union Ads'--}}
        {{--                      },--}}
        {{--                      {--}}
        {{--                        value: 300,--}}
        {{--                        name: 'Video Ads'--}}
        {{--                      }--}}
        {{--                    ]--}}
        {{--                  }]--}}
        {{--                });--}}
        {{--              });--}}
        {{--            </script>--}}

        {{--          </div>--}}
        {{--        </div><!-- End Website Traffic -->--}}

        {{--      </div><!-- End Right side columns -->--}}

        {{--    </div>--}}
        {{--  </section>--}}

    </main><!-- End #main -->
@endsection
