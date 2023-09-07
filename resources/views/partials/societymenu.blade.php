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
    </li><!-- End Dashboard Nav -->
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
    </li>
    <li class="nav-item">
        <a class="nav-link " href="/jr/add">
          <i class="bi bi-grid"></i>
          <span>JR Details</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="/jr/list">
          <i class="bi bi-grid"></i>
          <span>JR List</span>
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
    </li><!-- End Dashboard Nav -->
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
    </li><!-- End Dashboard Nav -->
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
    </li><!-- End Dashboard Nav -->
  </ul>
  @endif
  @if(Auth::user()->role > 4)
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
            <a href="/society/croploan/target">
              <i class="bi bi-circle"></i><span>Target</span>
            </a>
          </li>
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
      <li class="nav-item">
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
      </li><!-- End Forms Nav -->
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
  </aside><!-- End Sidebar-->
