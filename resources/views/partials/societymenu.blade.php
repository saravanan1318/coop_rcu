<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  @if(Auth::user()->role == 1)
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="/md/loanlist">
        <i class="bi bi-grid"></i>
        <span>Loan</span>
      </a>
    </li>
    <!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/md/croploanlist">
        <i class="bi bi-grid"></i>
        <span>Crop Loan</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/md/depositlist">
        <i class="bi bi-grid"></i>
        <span>Deposit</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/md/purchaselist">
        <i class="bi bi-grid"></i>
        <span>Purchase</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/md/saleslist">
        <i class="bi bi-grid"></i>
        <span>Sales</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/md/godownlist">
        <i class="bi bi-grid"></i>
        <span>Godown</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/md/servicelist">
        <i class="bi bi-grid"></i>
        <span>Services</span>
      </a>
    </li><!-- End Dashboard Nav -->
  </ul>
  @endif
  @if(Auth::user()->role == 2)
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="/superadmin/loanlist">
        <i class="bi bi-grid"></i>
        <span>Loan</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/superadmin/croploanlist">
        <i class="bi bi-grid"></i>
        <span>Crop Loan</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/superadmin/depositlist">
        <i class="bi bi-grid"></i>
        <span>Deposit</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/superadmin/purchaselist">
        <i class="bi bi-grid"></i>
        <span>Purchase</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/superadmin/saleslist">
        <i class="bi bi-grid"></i>
        <span>Sales</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/superadmin/godownlist">
        <i class="bi bi-grid"></i>
        <span>Godown</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/superadmin/servicelist">
        <i class="bi bi-grid"></i>
        <span>Services</span>
      </a>
    </li>
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#Report-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="Report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="/superadmin/loanreport">
                      <i class="bi bi-circle"></i><span>Loan</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/croploanreport">
                      <i class="bi bi-circle"></i><span>Crop Loan</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/depositreport">
                      <i class="bi bi-circle"></i><span>Deposit</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/purchasereport">
                      <i class="bi bi-circle"></i><span>Purchase</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/salereport">
                      <i class="bi bi-circle"></i><span>Sale</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/godownreport">
                      <i class="bi bi-circle"></i><span>Godown</span>
                  </a>
              </li>
          </ul>
      </li>
      <!-- End Dashboard Nav -->
  </ul>
  @endif
  @if(Auth::user()->role == 3)
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="/jr/loanlist">
        <i class="bi bi-grid"></i>
        <span>Loan</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/jr/croploanlist">
        <i class="bi bi-grid"></i>
        <span>Crop Loan</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/jr/depositlist">
        <i class="bi bi-grid"></i>
        <span>Deposit</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/jr/purchaselist">
        <i class="bi bi-grid"></i>
        <span>Purchase</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/jr/saleslist">
        <i class="bi bi-grid"></i>
        <span>Sales</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/jr/godownlist">
        <i class="bi bi-grid"></i>
        <span>Godown</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/jr/servicelist">
        <i class="bi bi-grid"></i>
        <span>Services</span>
      </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#issue-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Establishment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="issue-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#department-nav">
              <i class="bi bi-grid"></i>
              <span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="department-nav" class="collapse">
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#17a-nav">
                  <i class="bi bi-grid"></i>
                  <span>Disciplinary Action-17(A) & 17(B)</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="17a-nav" class="collapse">
                  <li><a href="/jr/seventeena/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
                  <li><a href="/jr/seventeena/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#society-nav">
              <i class="bi bi-grid"></i>
              <span>Society</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="society-nav" class="collapse">
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#dai-nav">
                  <i class="bi bi-grid"></i>
                  <span>Disciplinary Action-Institution</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="dai-nav" class="collapse">
                  <li><a href="/jr/dai/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
                  <li><a href="/jr/dai/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#issue-nav">
          <i class="bi bi-journal-text"></i><span>Statutory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="issue-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#inquiry-nav">
              <i class="bi bi-grid"></i>
              <span>81-Inquiry</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inquiry-nav" class="collapse">
              <li><a href="/jr/eightyone/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/jr/eightyone/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#inspection-nav">
              <i class="bi bi-grid"></i>
              <span>82-Inspection</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inspection-nav" class="collapse">
              <li><a href="/jr/eightytwo/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/jr/eightytwo/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#disqualification-nav">
              <i class="bi bi-grid"></i>
              <span>36-Disqualification</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="disqualification-nav" class="collapse">
              <li><a href="/jr/disqualify/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/jr/disqualify/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#surcharge-nav">
              <i class="bi bi-grid"></i>
              <span>87-Surcharge</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="surcharge-nav" class="collapse">
              <li><a href="/jr/surcharge/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/jr/surcharge/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
        </ul>
      </li>

      <script>
        // Add jQuery or JavaScript code to toggle the collapse/expand behavior
        $(".nav-link.collapsed").on("click", function() {
          $(this).find(".bi-chevron-down").toggleClass("rotate-180");
        });
      </script><!-- End Dashboard Nav -->
  </ul>
  @endif
  @if(Auth::user()->role == 4)
  <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="/dr/loanlist">
        <i class="bi bi-grid"></i>
        <span>Loan</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/dr/croploanlist">
        <i class="bi bi-grid"></i>
        <span>Crop Loan</span>
      </a>
    <!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/dr/depositlist">
        <i class="bi bi-grid"></i>
        <span>Deposit</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/dr/purchaselist">
        <i class="bi bi-grid"></i>
        <span>Purchase</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/dr/saleslist">
        <i class="bi bi-grid"></i>
        <span>Sales</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/dr/godownlist">
        <i class="bi bi-grid"></i>
        <span>Godown</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/dr/servicelist">
        <i class="bi bi-grid"></i>
        <span>Services</span>
      </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#issue-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Establishment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="issue-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#department-nav">
              <i class="bi bi-grid"></i>
              <span>Department</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="department-nav" class="collapse">
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#17a-nav">
                  <i class="bi bi-grid"></i>
                  <span>Disciplinary Action-17(A) & 17(B)</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="17a-nav" class="collapse">
                  <li><a href="/dr/seventeena/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
                  <li><a href="/dr/seventeena/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#society-nav">
              <i class="bi bi-grid"></i>
              <span>Society</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="society-nav" class="collapse">
              <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#dai-nav">
                  <i class="bi bi-grid"></i>
                  <span>Disciplinary Action-Institution</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="dai-nav" class="collapse">
                  <li><a href="/dr/dai/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
                  <li><a href="/dr/dai/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-toggle="collapse" href="#issue-nav">
          <i class="bi bi-journal-text"></i><span>Statutory</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="issue-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#inquiry-nav">
              <i class="bi bi-grid"></i>
              <span>81-Inquiry</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inquiry-nav" class="collapse">
              <li><a href="/dr/eightyone/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/dr/eightyone/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#inspection-nav">
              <i class="bi bi-grid"></i>
              <span>82-Inspection</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inspection-nav" class="collapse">
              <li><a href="/dr/eightytwo/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/dr/eightytwo/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#disqualification-nav">
              <i class="bi bi-grid"></i>
              <span>36-Disqualification</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="disqualification-nav" class="collapse">
              <li><a href="/dr/disqualify/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/dr/disqualify/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#surcharge-nav">
              <i class="bi bi-grid"></i>
              <span>87-Surcharge</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="surcharge-nav" class="collapse">
              <li><a href="/dr/surcharge/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>
              <li><a href="/dr/surcharge/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
        </ul>
      </li>


      <script>
        // Add jQuery or JavaScript code to toggle the collapse/expand behavior
        $(".nav-link.collapsed").on("click", function() {
          $(this).find(".bi-chevron-down").toggleClass("rotate-180");
        });
      </script>



      <!-- End Dashboard Nav -->
  </ul>
  @endif
  @if(Auth::user()->role > 4 && Auth::user()->role <= 13)
    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#issue-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Loan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="issue-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/loan/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/loan">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
          {{-- <li>
            <a href="/society/loan/collection">
              <i class="bi bi-circle"></i><span>Collection</span>
            </a>
          </li>
          <li> --}}
            <a href="/society/loan/annual">
              <i class="bi bi-circle"></i><span>Annual Target & outstanding</span>
            </a>
          </li>
          {{-- <li>
            <a href="/society/loan/annual">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li> --}}
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#croploan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Crop Loan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="croploan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/croploan/entry">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/croploan">
              <i class="bi bi-circle"></i><span>view</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/deposit/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/deposit/list">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
          <li>
            <a href="/society/deposit/annual/add">
              <i class="bi bi-circle"></i><span>Annaul Target & outstanding</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#purchase-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Purchase</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="purchase-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/purchase/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/purchase/list">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#sales-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Sales</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="sales-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/sale/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/sale/list">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#godown-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Godown</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="godown-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/godown/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/godown">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <!--<li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#projects-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Projects</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="projects-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/projects/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/projects/list">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li>--><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/services/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/society/services">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li>

      <!-- End Forms Nav -->
      {{-- <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}
    </ul>
  @endif
  @if(Auth::user()->role == 14)
   <ul class="sidebar-nav" id="sidebar-nav">
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#build-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span> Fair Shop Building</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="build-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/drpds/build_yet_started/add">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
          <li>
            <a href="/drpds/build_yet_started/list">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#build-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Facelifting</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="build-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/drpds/facelifting/add">
              <i class="bi bi-circle"></i><span>Add</span>
            </a>
          </li>
          <li>
            <a href="/drpds/facelifting/list">
              <i class="bi bi-circle"></i><span>List</span>
            </a>
          </li>
        </ul>
      </li>
  </ul>
@endif
</aside><!-- End Sidebar-->
