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
                            <h4 class="page-title">Formulaire Offre</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Offre</a></li>
                                    <li class="breadcrumb-item"><a href="#">Formulaire</a></li>
                                    <li class="breadcrumb-item active">Validation</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Créer un nouveau Offre') }}</h3></div>
                            <div class="card-body">
                                <div class="form">
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="{{ route('offres.store') }}" autocomplete="off" class="form-horizontal" novalidate>
                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="form-group row">
                                                <label for="input-libelle" class="col-form-label col-lg-2">{{ __('Libellé *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('libelle') ? ' is-invalid' : '' }}" type="text"  name="libelle" id="input-libelle" value="{{ old('libelle') }}" required/>
                                                    @if ($errors->has('duree'))
                                                        <span id="libelle-error" class="error text-danger" for="input-libelle">{{ $errors->first('duree') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                          










                                            <div class="form-group row">
                                                <label for="input-prix" class="col-form-label col-lg-2">{{ __('Durée *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('duree') ? ' is-invalid' : '' }}" name="duree" id="input-duree" type="text" value="{{ old('duree') }}" required />
                                                    @if ($errors->has('prix'))
                                                        <span id="prix-error" class="error text-danger" for="input-duree">{{ $errors->first('duree') }}</span>
                                                    @endif
                                                </div>
                                            </div>














                                            <div class="form-group row">
                                                <label for="input-prix" class="col-form-label col-lg-2">{{ __('Prix *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('prix') ? ' is-invalid' : '' }}" name="prix" id="input-prix" type="text" value="{{ old('prix') }}" required />
                                                    @if ($errors->has('prix'))
                                                        <span id="prix-error" class="error text-danger" for="input-prix">{{ $errors->first('prix') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="offset-lg-2 col-lg-10">
                                                    <button class="btn btn-outline-primary waves-effect waves-light mr-1" type="submit"><i class="fas fa-save"></i> &nbsp; Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- .form -->
                                </div>
                                <!-- .form -->
                            </div>
                            <!-- card-body -->
                        </div>
                        <!-- card -->
                    </div>
                    <!-- col -->

                </div>
                <!-- End row -->

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
