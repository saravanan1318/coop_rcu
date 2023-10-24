@extends('layouts.master')
@section('content')
    <main id="main" class="main">

        <div class="d-flex justify-content-between">
            <div class="pagetitle" class="col-sm-6">
                <h1>{{$title}}</h1>
                <nav>
                    <ol class="breadcrumb ">
                        <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">{{$title}}</li>
                    </ol>
                </nav>

            </div><!-- End Page Title -->
            <div>
                <p style="align:right;"><a href="{{url()->current()}}/add" class="btn btn-primary"><i class="bi bi-plus"></i> Add New</a></p>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card info-card sales-card">
            <div class="card-body">
                <div class="col-12">
                    @if(isset($regions))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Region</th>
                                <th>Region Code</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($regions as $region)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$region->region_name}}</td>
                                    <td>{{$region->region_code}}</td>
                                    <td><a href="regionmaster/edit/{{$region->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
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
                                <th>Region Name</th>
                                <th>Circle Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($circles as $circle)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$circle->region_name}}</td>
                                    <td>{{$circle->circle_name}}</td>
                                    <td><a href="circlemaster/edit/{{$circle->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
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
                                <th>Region Name</th>
                                <th>Circle Name</th>
                                <th>Society Type</th>
                                <th>Society Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($societies as $society)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$society->region_name}}</td>
                                    <td>{{$society->circle_name}}</td>
                                    <td>{{$society->societytype}}</td>
                                    <td>{{$society->society_name}}</td>
                                    <td><a href="societymaster/edit/{{$society->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($societytypes))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Society Type</th>
                                <th>Role</th>
                                <th>Society Code</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($societytypes as $societytype)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$societytype->societytype}}</td>
                                    <td>{{$societytype->role_name}}</td>
                                    <td>{{$societytype->societycode}}</td>
                                    <td><a href="societytypemaster/edit/{{$societytype->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($districts))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>District Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($districts as $district)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$district->districtName}}</td>
                                    <td><a href="districtmaster/edit/{{$district->districtID}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($blocks))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Block Panchayat Name</th>
                                <th>District Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($blocks as $block)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$block->blockPanchayatName}}</td>
                                    <td>{{$block->districtName}}</td>
                                    <td><a href="blockmaster/edit/{{$block->blockPanchayatID}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($villages))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Village Panchayat Name</th>
                                <th>Block Panchayat Name</th>
                                <th>District Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                            <?php $tmp=0 ?>
                            @foreach($villages as $village)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$village->villagePanchayatName}}</td>
                                    <td>{{$village->blockPanchayatName}}</td>
                                    <td>{{$village->districtName}}</td>
                                    <td><a href="villagemaster/edit/{{$village->villagePanchayatID}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($crops))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Crop Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                            <?php $tmp=0 ?>
                            @foreach($crops as $crop)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$crop->crop_name}}</td>
                                    <td><a href="cropmaster/edit/{{$crop->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($deposits))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Deposit Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($deposits as $deposit)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$deposit->deposit_name}}</td>
                                    <td><a href="depositmaster/edit/{{$deposit->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($loan))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Loan Type</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($loan as $item)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$item->loantype}}</td>
                                    <td><a href="loanmaster/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($purchase))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Purchase Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($purchase as $item)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$item->purchase_name}}</td>
                                    <td><a href="purchasemaster/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($sale))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Sale Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($sale as $item)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$item->sale_name}}</td>
                                    <td><a href="salemaster/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($services))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Service Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($services as $item)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$item->services_name}}</td>
                                    <td><a href="servicemaster/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(isset($minomillets))
                        <table id="data-table-dashboard">
                            <thead>
                            <tr><th colspan="6"><center>{{$title}}</center></th></tr>
                            <tr>
                                <th>S.No</th>
                                <th>Service Name</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody id="logged-datas">

                                <?php $tmp=0 ?>
                            @foreach($minomillets as $item)
                                @php
                                    $tmp++;
                                @endphp
                                <tr>
                                    <td>{{$tmp}}</td>
                                    <td>{{$item->grain_name}}</td>
                                    <td><a href="minomilletmtr/edit/{{$item->id}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i> Edit</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>


    </main><!-- End #main -->
@endsection
