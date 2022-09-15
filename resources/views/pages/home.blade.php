@extends('layouts.app')

@section('content')
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Bienvenue! Vous êtes bien connecter et vous pouvez commencer maintenant. Bonne continuation! :) </h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Moltran</a></li>
                                    <li class="breadcrumb-item active">Widgets</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- start row -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="media">
                                <div class="avatar-md bg-info rounded-circle mr-2">
                                    <i class="ion-md-contacts avatar-title font-26 text-white"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="text-right">
                                        <h4 class="my-0 font-weight-bold"><span data-plugin="counterup">{{ $clients ?? '0' }}</span></h4>
                                        <p class="mb-0 mt-1 text-truncate">Total Clients</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="media">
                                <div class="avatar-md bg-purple rounded-circle">
                                    <i class="ion-md-clipboard avatar-title font-26 text-white"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="text-right">
                                        <h4 class="my-0 font-weight-bold"><span data-plugin="counterup">{{ $offres ?? '0' }}</span></h4>
                                        <p class="mb-0 mt-1 text-truncate">Total Offres</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="media">
                                <div class="avatar-md bg-success rounded-circle">
                                    <i class="ion-md-radio avatar-title font-26 text-white"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="text-right">
                                        <h4 class="my-0 font-weight-bold"><span data-plugin="counterup">{{  $diffusions ?? '0' }}</span></h4>
                                        <p class="mb-0 mt-1 text-truncate">Total diffusions</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        


                        <!-- end card-box-->
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <div class="card-box">
                            <div class="media">
                                <div class="avatar-md bg-primary rounded-circle">
                                    <i class="ion-md-cart avatar-title font-26 text-white"></i>
                                </div>
                                <div class="media-body align-self-center">
                                    <div class="text-right">
                                        <h4 class="my-0 font-weight-bold"><span data-plugin="counterup">{{ $commandes ?? '0' }}</span></h4>
                                        <p class="mb-0 mt-1 text-truncate">Total commandes</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end card-box-->
                    </div>
                </div>
                <!-- end row -->


                <div class="col-md-14 col-xl-18 text-center">
                      <div class="card-box">
                         <div class="media">
                             <img src="{{asset('assets')}}/images/Logo-rofia.jpg" alt="logo-rofia"  class="col-md-9 col-xl-17">
                         </div>
                     </div>
                        <!-- end card-box-->
                 </div>

                <br>
 
            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->






    </div>
    @push('script')
        <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
        @include('vendor.flashy.message')
    @endpush
    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

@endsection



