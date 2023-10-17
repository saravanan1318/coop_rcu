<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
  @if(Auth::user()->role == 1)
  <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
          <a class="nav-link " href="/md/dashboard">
              <i class="bi bi-grid"></i>
              <span>Dashboard - Tableau</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#Report-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Reports</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="Report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="/md/loanreport">
                      <i class="bi bi-circle"></i><span>Loan</span>
                  </a>
              </li>
              <li>
                  <a href="/md/croploanreport">
                      <i class="bi bi-circle"></i><span>Crop Loan</span>
                  </a>
              </li>
              <li>
                  <a href="/md/depositreport">
                      <i class="bi bi-circle"></i><span>Deposit</span>
                  </a>
              </li>
              <li>
                  <a href="/md/purchasereport">
                      <i class="bi bi-circle"></i><span>Purchase</span>
                  </a>
              </li>
              <li>
                  <a href="/md/salereport">
                      <i class="bi bi-circle"></i><span>Sale</span>
                  </a>
              </li>
              <li>
                  <a href="/md/godownreport">
                      <i class="bi bi-circle"></i><span>Godown</span>
                  </a>
              </li>
              <li>
                  <a href="/md/byireport">
                      <i class="bi bi-circle"></i><span>BYI</span>
                  </a>
              </li>
              <li>
                  <a href="/md/faceliftingreport">
                      <i class="bi bi-circle"></i><span>Facelifting</span>
                  </a>
              </li>
              <li>
                  <a href="/md/isoreport">
                      <i class="bi bi-circle"></i><span>ISO</span>
                  </a>
              </li>
              <li>
                  <a href="/md/teareport">
                      <i class="bi bi-circle"></i><span>Tea</span>
                  </a>
              </li>
              <li>
                  <a href="/md/indcoreport">
                      <i class="bi bi-circle"></i><span>Indco</span>
                  </a>
              </li>
              <li>
                  <a href="/md/saltreport">
                      <i class="bi bi-circle"></i><span>Salt Sales</span>
                  </a>
              </li>
              <li>
                  <a href="/md/duesaltreport">
                      <i class="bi bi-circle"></i><span>Dues to TN Salts</span>
                  </a>
              </li>
              <li>
                  <a href="/md/palmjaggeryreport">
                      <i class="bi bi-circle"></i><span>Palm Jaggery</span>
                  </a>
              </li>
              <li>
                  <a href="/md/upi_fpsreport">
                      <i class="bi bi-circle"></i><span>UPI-FPS</span>
                  </a>
              </li>
              <li>
                  <a href="/md/gunnyduereport">
                      <i class="bi bi-circle"></i><span>Gunny Due</span>
                  </a>
              </li>
              <li>
                  <a href="/md/gunnysalereport">
                      <i class="bi bi-circle"></i><span>Gunny Sale</span>
                  </a>
              </li>
              <li>
                  <a href="/md/remittancereport">
                      <i class="bi bi-circle"></i><span>Remittance</span>
                  </a>
              </li>
          </ul>
      </li>
  </ul>
  @endif
  @if(Auth::user()->role == 2)
  <ul class="sidebar-nav" id="sidebar-nav">
   {{-- <li class="nav-item">
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
    </li>--}}
      <li class="nav-item">
          <a class="nav-link " href="/superadmin/dashboard">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
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
              <li>
                  <a href="/superadmin/byireport">
                      <i class="bi bi-circle"></i><span>BYI</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/faceliftingreport">
                      <i class="bi bi-circle"></i><span>Facelifting</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/isoreport">
                      <i class="bi bi-circle"></i><span>ISO</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/teareport">
                      <i class="bi bi-circle"></i><span>Tea</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/indcoreport">
                      <i class="bi bi-circle"></i><span>Indco</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/saltreport">
                      <i class="bi bi-circle"></i><span>Salt Sales</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/duesaltreport">
                      <i class="bi bi-circle"></i><span>Dues to TN Salts</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/palmjaggeryreport">
                      <i class="bi bi-circle"></i><span>Palm Jaggery</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/upi_fpsreport">
                      <i class="bi bi-circle"></i><span>UPI-FPS</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/gunnyduereport">
                      <i class="bi bi-circle"></i><span>Gunny Due</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/gunnysalereport">
                      <i class="bi bi-circle"></i><span>Gunny Sale</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/remittancereport">
                      <i class="bi bi-circle"></i><span>Remittance</span>
                  </a>
              </li>
          </ul>
      </li>

      {{--Ranjith--}}
      {{--Ranjith--}}
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#Master-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-list-ul"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="Master-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="/superadmin/regionmaster">
                      <i class="bi bi-circle"></i><span>Region</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/circlemaster">
                      <i class="bi bi-circle"></i><span>Circle</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/societymaster">
                      <i class="bi bi-circle"></i><span>Society</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/societytypemaster">
                      <i class="bi bi-circle"></i><span>Society Type</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/districtmaster">
                      <i class="bi bi-circle"></i><span>District</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/blockmaster">
                      <i class="bi bi-circle"></i><span>Block Panchayat</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/villagemaster">
                      <i class="bi bi-circle"></i><span>Village Panchayat</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/cropmaster">
                      <i class="bi bi-circle"></i><span>Crop</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/depositmaster">
                      <i class="bi bi-circle"></i><span>Deposit</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/loanmaster">
                      <i class="bi bi-circle"></i><span>Loan</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/purchasemaster">
                      <i class="bi bi-circle"></i><span>Purchase</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/salemaster">
                      <i class="bi bi-circle"></i><span>Sale</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/servicemaster">
                      <i class="bi bi-circle"></i><span>Service</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/minomilletmtr">
                      <i class="bi bi-circle"></i><span>Mino Millet</span>
                  </a>
              </li>

          </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#User-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-people"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="User-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="/superadmin/jrusers">
                      <i class="bi bi-circle"></i><span>JR</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/drusers">
                      <i class="bi bi-circle"></i><span>Dr</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/societyusers">
                      <i class="bi bi-circle"></i><span>Society</span>
                  </a>
              </li>
              <li>
                  <a href="/superadmin/userrole">
                      <i class="bi bi-circle"></i><span>Role</span>
                  </a>
              </li>
          </ul>
      </li>
      {{--      Ranjith--}}
{{--      Ranjith--}}
      <!-- End Dashboard Nav -->
  </ul>
  @endif
   @if(Auth::user()->role == 3)
  <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#issue-nav-loans" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Loan</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="issue-nav-loans" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                  <li>
                      <a href="/jr/loanlist">
                          <i class="bi bi-circle"></i><span>Loans</span>
                      </a>
                  </li>
                  <li>
                      <a href="/jr/annualtarget">
                          <i class="bi bi-circle"></i><span>Annual Target</span>
                      </a>
                  </li>

          </ul>
      </li>
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
             <!-- <li><a href="/jr/eightyone/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>-->
              <li><a href="/jr/eightyone/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-toggle="collapse" href="#inspection-nav">
              <i class="bi bi-grid"></i>
              <span>82-Inspection</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="inspection-nav" class="collapse">
{{--              <li><a href="/jr/eightytwo/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>--}}
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
              <!--<li><a href="/jr/surcharge/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li> -->
              <li><a href="/jr/surcharge/list"><i class="bi bi-file-earmark-text"></i> View</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#build-nav-press" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Press</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="build-nav-press" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="/jr/press/add">
                      <i class="bi bi-circle"></i><span>Entry</span>
                  </a>
              </li>
              <li>
                  <a href="/jr/press/list">
                      <i class="bi bi-circle"></i><span>View</span>
                  </a>
              </li>
          </ul>
      </li>
      <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#build-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-journal-text"></i><span>Profit & Loss</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="build-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                  <a href="/jr/profit/add">
                      <i class="bi bi-circle"></i><span>Entry</span>
                  </a>
              </li>
              <li>
                  <a href="/jr/profit/list">
                      <i class="bi bi-circle"></i><span>View</span>
                  </a>
              </li>
          </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Project Monitering</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="services-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/jr/project/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/jr/project/list">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
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
                 <!--<li><a href="/dr/seventeena/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>-->
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
                  <!--<li><a href="/dr/dai/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>-->
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
              <!--<li><a href="/dr/disqualify/add"><i class="bi bi-file-earmark-plus"></i> Entry</a></li>-->
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
      @if(Auth::user()->role == 20)
          <ul class="sidebar-nav" id="sidebar-nav">
              <li class="nav-item">
                  <a class="nav-link " href="#">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li><!-- End Dashboard Nav -->
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#build-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span> Fair Price Shop Building</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="build-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/build_yet_started/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/build_yet_started/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#facelifting-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Facelifting</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="facelifting-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#ISO-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>ISO</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="ISO-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/iso/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/iso/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#Tea-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Tea</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="Tea-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/tea/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/tea/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#Indcoserve-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Indcoserve</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="Indcoserve-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/indcoserve/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/indcoserve/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>

              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#saltsale-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Salt Sales</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="saltsale-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/salt/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/salt/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#salt-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Dues to TN Salt</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="salt-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/duesalt/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/duesalt/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#build-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Special Due</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="build-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/special/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/special/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#palm-jaggery-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Palm Jaggery</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="palm-jaggery-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/palm-jaggery/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/palm-jaggery">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#mino-millet-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Mino - Millet</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="mino-millet-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/mino-millet/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/mino-millet">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#upi-fps-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>UPI - FPS</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="upi-fps-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/upi-fps/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/upi-fps">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#margin-money-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Margin Money</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="margin-money-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/margin-money/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/margin-money">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#gunny-dues-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Gunny Dues</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="gunny-dues-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/gunny-dues/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/gunny-dues">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#gunny-sales-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Gunny Sales</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="gunny-sales-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/gunny-sales/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/gunny-sales">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#remittance-to-govt-ac-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>Remittance to Govt Ac</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="remittance-to-govt-ac-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/drpds/remittance-to-govt-ac/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/drpds/remittance-to-govt-ac">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>

      @endif
      @if(Auth::user()->role ==5 )
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
                      <a href="/society/deposit/annual">
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 6 )
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

          <!-- End Forms Nav -->
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 7 )
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

          <!-- End Forms Nav -->
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 8 )
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

          <!-- End Forms Nav -->
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 9 )
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
          <!-- End Forms Nav -->
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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

      @if(Auth::user()->role == 10 )
          <ul class="sidebar-nav" id="sidebar-nav">

              <li class="nav-item">
                  <a class="nav-link " href="#">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <!-- End Forms Nav -->
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
              {{--<li class="nav-item">
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
              </li>--}}<!-- End Forms Nav -->
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

      @if(Auth::user()->role == 11 )
          <ul class="sidebar-nav" id="sidebar-nav">

              <li class="nav-item">
                  <a class="nav-link " href="#">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li><!-- End Dashboard Nav -->

              <!-- End Forms Nav -->
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
              {{--<li class="nav-item">
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
              </li>--}}<!-- End Forms Nav -->
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

      @if(Auth::user()->role == 12 )
          <ul class="sidebar-nav" id="sidebar-nav">

              <li class="nav-item">
                  <a class="nav-link " href="#">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li><!-- End Dashboard Nav -->
              <!-- End Forms Nav -->

              <!-- End Forms Nav -->
              {{--<li class="nav-item">
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
              </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 13 )
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 14 )
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 15 )
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 16 )
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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


      @if(Auth::user()->role == 17 )
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
          <!-- End Forms Nav -->
          <!-- End Forms Nav -->
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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

      @if(Auth::user()->role == 18 )
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
          <!-- End Forms Nav -->
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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

      @if(Auth::user()->role == 19 )
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
          {{--<li class="nav-item">
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
          </li>--}}<!-- End Forms Nav -->
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
      @if(Auth::user()->role == 21 )
          <ul class="sidebar-nav" id="sidebar-nav">

              <li class="nav-item">
                  <a class="nav-link " href="#">
                      <i class="bi bi-grid"></i>
                      <span>Dashboard</span>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link collapsed" data-bs-target="#services-nav" data-bs-toggle="collapse" href="#">
                      <i class="bi bi-journal-text"></i><span>CM CELL Petitions</span><i class="bi bi-chevron-down ms-auto"></i>
                  </a>
                  <ul id="services-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                      <li>
                          <a href="/office/cm/add">
                              <i class="bi bi-circle"></i><span>Entry</span>
                          </a>
                      </li>
                      <li>
                          <a href="/office/cm/list">
              <i class="bi bi-circle"></i><span>View</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#court-case-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Court Cases</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="court-case-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/office/case/add">
              <i class="bi bi-circle"></i><span>Entry</span>
            </a>
          </li>
          <li>
            <a href="/office/case/list">
                              <i class="bi bi-circle"></i><span>View</span>
                          </a>
                      </li>
                  </ul>
              </li>
          </ul>
      @endif
</aside><!-- End Sidebar-->
