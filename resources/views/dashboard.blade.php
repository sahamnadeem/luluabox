@extends('layouts.app')

@section('title', 'Dashboard')

@push('before-styles')
    <link href="{{ asset('css/layout.min.css') }}" rel="stylesheet" type="text/css">
@endpush

@push('after-scripts')
    <script src="{{ asset('js/plugins/extensions/jquery_ui/interactions.min.js') }}"></script>
    <script src="{{ asset('js/plugins/visualization/d3/d3.min.js') }}"></script>
    <script src="{{ asset('js/plugins/visualization/d3/d3_tooltip.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/styling/switchery.min.js') }}"></script>
    <script src="{{ asset('js/plugins/forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset('js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/demo_pages/dashboard.js') }}"></script>
    <script src="{{ asset('js/myapp.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
@endpush

@section('content')
    @include('includes.navbar')
    <!-- Page content -->
    <div class="page-content" style="margin-top: 0px; ">
        <!-- Main sidebar -->
    @include('includes.sidebar')
        <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
                @include('includes.pageheader');
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">


                <!-- Dashboard content -->
                <div class="row">
                    <div class="col-xl-12">


                        <!-- Quick stats boxes -->
                        <div class="row">
                            <div class="col-lg-3">

                                <!-- Members online -->
                                <div class="card bg-teal-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">3,450</h3>
                                            <span class="badge bg-teal-800 badge-pill align-self-center ml-auto">+53,6%</span>
                                        </div>

                                        <div>
                                            Members online
                                            <div class="font-size-sm opacity-75">489 avg</div>
                                        </div>
                                    </div>

                                    <div class="container-fluid">
                                        <div id="members-online"></div>
                                    </div>
                                </div>
                                <!-- /members online -->

                            </div>

                            <div class="col-lg-3">

                                <!-- Current server load -->
                                <div class="card bg-pink-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">49.4%</h3>
                                            <div class="list-icons ml-auto">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            Current server load
                                            <div class="font-size-sm opacity-75">34.6% avg</div>
                                        </div>
                                    </div>

                                    <div id="server-load"></div>
                                </div>
                                <!-- /current server load -->

                            </div>

                            <div class="col-lg-3">

                                <!-- Today's revenue -->
                                <div class="card bg-blue-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">$18,390</h3>
                                            <div class="list-icons ml-auto">
                                                <a class="list-icons-item" data-action="reload"></a>
                                            </div>
                                        </div>

                                        <div>
                                            Today's revenue
                                            <div class="font-size-sm opacity-75">$37,578 avg</div>
                                        </div>
                                    </div>

                                    <div id="today-revenue"></div>
                                </div>
                                <!-- /today's revenue -->

                            </div>

                            <div class="col-lg-3">

                                <!-- Current server load -->
                                <div class="card bg-purple-400">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h3 class="font-weight-semibold mb-0">49.4%</h3>
                                            <div class="list-icons ml-auto">
                                                <div class="list-icons-item dropdown">
                                                    <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i></a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item"><i class="icon-sync"></i> Update data</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-list-unordered"></i> Detailed log</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-pie5"></i> Statistics</a>
                                                        <a href="#" class="dropdown-item"><i class="icon-cross3"></i> Clear list</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            Current server load
                                            <div class="font-size-sm opacity-75">34.6% avg</div>
                                        </div>
                                    </div>

                                    <div id="server-loadtwo"></div>
                                </div>
                                <!-- /current server load -->

                            </div>
                        </div>
                        <!-- /quick stats boxes -->

                    </div>
                </div>
                <!-- /dashboard content -->
            </div>
            <!-- /content area -->


            <!-- Footer -->
            @include('includes.footer')
            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
@endsection
