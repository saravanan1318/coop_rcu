<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  @if(Auth::user()->role == 5)
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
            <a href="/society/loan/issue">
              <i class="bi bi-circle"></i><span>Issue</span>
            </a>
          </li>
          <li>
            <a href="/society/loan/collection">
              <i class="bi bi-circle"></i><span>Collection</span>
            </a>
          </li>
          <li>
            <a href="/society/loan/annual">
              <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/deposit/list">
              <i class="bi bi-circle"></i><span>Deposits</span>
            </a>
          </li>
          <li>
            <a href="/society/deposit/annual">
              <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
            <a href="/society/purchase/list">
              <i class="bi bi-circle"></i><span>Purchase</span>
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
            <a href="/society/sale/list">
              <i class="bi bi-circle"></i><span>Sales</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link " href="/society/godown">
          <i class="bi bi-grid"></i>
          <span>Godown</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>Projects</span>
        </a>
      </li><!-- End Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Services</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/services/csc">
              <i class="bi bi-circle"></i><span>Common Service Centres</span>
            </a>
          </li>
          <li>
            <a href="/society/services/agri">
              <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
            </a>
          </li>
          <li>
            <a href="/society/services/dry">
              <i class="bi bi-circle"></i><span>Drying yard</span>
            </a>
          </li>
          <li>
            <a href="/society/services/ps">
              <i class="bi bi-circle"></i><span>Providing Seeds</span>
            </a>
          </li>
          <li>
            <a href="/society/services/pss">
              <i class="bi bi-circle"></i><span>Price Support Service</span>
            </a>
          </li>
          <li>
            <a href="/society/services/lodging">
              <i class="bi bi-circle"></i><span>Lodging</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      {{-- <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}
    </ul>
  @elseif(Auth::user()->role == 6)
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
            <a href="/society/loan/issue">
              <i class="bi bi-circle"></i><span>Issue</span>
            </a>
          </li>
          <li>
            <a href="/society/loan/collection">
              <i class="bi bi-circle"></i><span>Collection</span>
            </a>
          </li>
          <li>
            <a href="/society/loan/annual">
              <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/deposit/list">
              <i class="bi bi-circle"></i><span>Deposits</span>
            </a>
          </li>
          <li>
            <a href="/society/deposit/annual">
              <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
            <a href="/society/services/csc">
              <i class="bi bi-circle"></i><span>Common Service Centres</span>
            </a>
          </li>
          <li>
            <a href="/society/services/agri">
              <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
            </a>
          </li>
          <li>
            <a href="/society/services/dry">
              <i class="bi bi-circle"></i><span>Drying yard</span>
            </a>
          </li>
          <li>
            <a href="/society/services/ps">
              <i class="bi bi-circle"></i><span>Providing Seeds</span>
            </a>
          </li>
          <li>
            <a href="/society/services/pss">
              <i class="bi bi-circle"></i><span>Price Support Service</span>
            </a>
          </li>
          <li>
            <a href="/society/services/lodging">
              <i class="bi bi-circle"></i><span>Lodging</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      {{-- <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}
    </ul>
  @elseif(Auth::user()->role == 7)
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
            <a href="/society/loan/issue">
              <i class="bi bi-circle"></i><span>Issue</span>
            </a>
          </li>
          <li>
            <a href="/society/loan/collection">
              <i class="bi bi-circle"></i><span>Collection</span>
            </a>
          </li>
          <li>
            <a href="/society/loan/annual">
              <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/society/deposit/list">
              <i class="bi bi-circle"></i><span>Deposits</span>
            </a>
          </li>
          <li>
            <a href="/society/deposit/annual">
              <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
            <a href="/society/services/csc">
              <i class="bi bi-circle"></i><span>Common Service Centres</span>
            </a>
          </li>
          <li>
            <a href="/society/services/agri">
              <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
            </a>
          </li>
          <li>
            <a href="/society/services/dry">
              <i class="bi bi-circle"></i><span>Drying yard</span>
            </a>
          </li>
          <li>
            <a href="/society/services/ps">
              <i class="bi bi-circle"></i><span>Providing Seeds</span>
            </a>
          </li>
          <li>
            <a href="/society/services/pss">
              <i class="bi bi-circle"></i><span>Price Support Service</span>
            </a>
          </li>
          <li>
            <a href="/society/services/lodging">
              <i class="bi bi-circle"></i><span>Lodging</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->
      {{-- <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav --> --}}
    </ul>
  @elseif(Auth::user()->role == 8)
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
          <a href="/society/loan/issue">
            <i class="bi bi-circle"></i><span>Issue</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/collection">
            <i class="bi bi-circle"></i><span>Collection</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/society/deposit/list">
            <i class="bi bi-circle"></i><span>Deposits</span>
          </a>
        </li>
        <li>
          <a href="/society/deposit/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
          <a href="/society/services/csc">
            <i class="bi bi-circle"></i><span>Common Service Centres</span>
          </a>
        </li>
        <li>
          <a href="/society/services/agri">
            <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
          </a>
        </li>
        <li>
          <a href="/society/services/dry">
            <i class="bi bi-circle"></i><span>Drying yard</span>
          </a>
        </li>
        <li>
          <a href="/society/services/ps">
            <i class="bi bi-circle"></i><span>Providing Seeds</span>
          </a>
        </li>
        <li>
          <a href="/society/services/pss">
            <i class="bi bi-circle"></i><span>Price Support Service</span>
          </a>
        </li>
        <li>
          <a href="/society/services/lodging">
            <i class="bi bi-circle"></i><span>Lodging</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
    {{-- <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav --> --}}
  </ul>
  @elseif(Auth::user()->role == 9)
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
          <a href="/society/loan/issue">
            <i class="bi bi-circle"></i><span>Issue</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/collection">
            <i class="bi bi-circle"></i><span>Collection</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/society/deposit/list">
            <i class="bi bi-circle"></i><span>Deposits</span>
          </a>
        </li>
        <li>
          <a href="/society/deposit/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
          <a href="/society/services/csc">
            <i class="bi bi-circle"></i><span>Common Service Centres</span>
          </a>
        </li>
        <li>
          <a href="/society/services/agri">
            <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
          </a>
        </li>
        <li>
          <a href="/society/services/dry">
            <i class="bi bi-circle"></i><span>Drying yard</span>
          </a>
        </li>
        <li>
          <a href="/society/services/ps">
            <i class="bi bi-circle"></i><span>Providing Seeds</span>
          </a>
        </li>
        <li>
          <a href="/society/services/pss">
            <i class="bi bi-circle"></i><span>Price Support Service</span>
          </a>
        </li>
        <li>
          <a href="/society/services/lodging">
            <i class="bi bi-circle"></i><span>Lodging</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
    {{-- <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav --> --}}
  </ul>
  @elseif(Auth::user()->role == 10)
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
          <a href="/society/loan/issue">
            <i class="bi bi-circle"></i><span>Issue</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/collection">
            <i class="bi bi-circle"></i><span>Collection</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/society/deposit/list">
            <i class="bi bi-circle"></i><span>Deposits</span>
          </a>
        </li>
        <li>
          <a href="/society/deposit/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
          <a href="/society/services/csc">
            <i class="bi bi-circle"></i><span>Common Service Centres</span>
          </a>
        </li>
        <li>
          <a href="/society/services/agri">
            <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
          </a>
        </li>
        <li>
          <a href="/society/services/dry">
            <i class="bi bi-circle"></i><span>Drying yard</span>
          </a>
        </li>
        <li>
          <a href="/society/services/ps">
            <i class="bi bi-circle"></i><span>Providing Seeds</span>
          </a>
        </li>
        <li>
          <a href="/society/services/pss">
            <i class="bi bi-circle"></i><span>Price Support Service</span>
          </a>
        </li>
        <li>
          <a href="/society/services/lodging">
            <i class="bi bi-circle"></i><span>Lodging</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
    {{-- <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav --> --}}
  </ul>
  @elseif(Auth::user()->role == 11)
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
          <a href="/society/loan/issue">
            <i class="bi bi-circle"></i><span>Issue</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/collection">
            <i class="bi bi-circle"></i><span>Collection</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/society/deposit/list">
            <i class="bi bi-circle"></i><span>Deposits</span>
          </a>
        </li>
        <li>
          <a href="/society/deposit/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
          <a href="/society/services/csc">
            <i class="bi bi-circle"></i><span>Common Service Centres</span>
          </a>
        </li>
        <li>
          <a href="/society/services/agri">
            <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
          </a>
        </li>
        <li>
          <a href="/society/services/dry">
            <i class="bi bi-circle"></i><span>Drying yard</span>
          </a>
        </li>
        <li>
          <a href="/society/services/ps">
            <i class="bi bi-circle"></i><span>Providing Seeds</span>
          </a>
        </li>
        <li>
          <a href="/society/services/pss">
            <i class="bi bi-circle"></i><span>Price Support Service</span>
          </a>
        </li>
        <li>
          <a href="/society/services/lodging">
            <i class="bi bi-circle"></i><span>Lodging</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
    {{-- <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav --> --}}
  </ul>
  @elseif(Auth::user()->role == 12)
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
          <a href="/society/loan/issue">
            <i class="bi bi-circle"></i><span>Issue</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/collection">
            <i class="bi bi-circle"></i><span>Collection</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/society/deposit/list">
            <i class="bi bi-circle"></i><span>Deposits</span>
          </a>
        </li>
        <li>
          <a href="/society/deposit/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
          <a href="/society/services/csc">
            <i class="bi bi-circle"></i><span>Common Service Centres</span>
          </a>
        </li>
        <li>
          <a href="/society/services/agri">
            <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
          </a>
        </li>
        <li>
          <a href="/society/services/dry">
            <i class="bi bi-circle"></i><span>Drying yard</span>
          </a>
        </li>
        <li>
          <a href="/society/services/ps">
            <i class="bi bi-circle"></i><span>Providing Seeds</span>
          </a>
        </li>
        <li>
          <a href="/society/services/pss">
            <i class="bi bi-circle"></i><span>Price Support Service</span>
          </a>
        </li>
        <li>
          <a href="/society/services/lodging">
            <i class="bi bi-circle"></i><span>Lodging</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
    {{-- <li class="nav-heading">Pages</li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="users-profile.html">
        <i class="bi bi-person"></i>
        <span>Profile</span>
      </a>
    </li><!-- End Profile Page Nav --> --}}
  </ul>
  @elseif(Auth::user()->role == 13)
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
          <a href="/society/loan/issue">
            <i class="bi bi-circle"></i><span>Issue</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/collection">
            <i class="bi bi-circle"></i><span>Collection</span>
          </a>
        </li>
        <li>
          <a href="/society/loan/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" data-bs-target="#deposit-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-journal-text"></i><span>Deposit</span><i class="bi bi-chevron-down ms-auto"></i>
      </a>
      <ul id="deposit-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
          <a href="/society/deposit/list">
            <i class="bi bi-circle"></i><span>Deposits</span>
          </a>
        </li>
        <li>
          <a href="/society/deposit/annual">
            <i class="bi bi-circle"></i><span>Target & outstanding (onetime)</span>
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
          <a href="/society/services/csc">
            <i class="bi bi-circle"></i><span>Common Service Centres</span>
          </a>
        </li>
        <li>
          <a href="/society/services/agri">
            <i class="bi bi-circle"></i><span>Agri Implements (Tractor, Cutting machine. Etc.)</span>
          </a>
        </li>
        <li>
          <a href="/society/services/dry">
            <i class="bi bi-circle"></i><span>Drying yard</span>
          </a>
        </li>
        <li>
          <a href="/society/services/ps">
            <i class="bi bi-circle"></i><span>Providing Seeds</span>
          </a>
        </li>
        <li>
          <a href="/society/services/pss">
            <i class="bi bi-circle"></i><span>Price Support Service</span>
          </a>
        </li>
        <li>
          <a href="/society/services/lodging">
            <i class="bi bi-circle"></i><span>Lodging</span>
          </a>
        </li>
      </ul>
    </li><!-- End Forms Nav -->
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
