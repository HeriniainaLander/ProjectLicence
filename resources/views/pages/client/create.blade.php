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
                            <h4 class="page-title">Formulaire Client</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Client</a></li>
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
                                <h3 class="card-title">{{ __('Créer un nouveau client') }}</h3></div>
                            <div class="card-body">
                                <div class="form">
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="{{ route('clients.store') }}" autocomplete="off" class="form-horizontal" novalidate>
                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="form-group row">
                                                <label for="firstname" class="col-form-label col-lg-2">Raison Sociale *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text"  name="name" id="input-name" value="{{ old('name') }}" required/>
                                                    @if ($errors->has('name'))
                                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastname" class="col-form-label col-lg-2">Classe *</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control{{ $errors->has('class') ? ' is-invalid' : '' }}" type="text" id="input-classe" name="class" value="{{ old('class') }}" required>
                                                        <option value="Service publique">Service Publique</option>
                                                        <option value="Service privée">Service Privée</option>
                                                    </select>
                                                    @if ($errors->has('class'))
                                                        <span id="name-error" class="error text-danger" for="input-class">{{ $errors->first('class') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="username" class="col-form-label col-lg-2">Adresse *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('adress') ? ' is-invalid' : '' }}" type="text" name="adress" id="input-adresse" value="{{ old('adress') }}" required />
                                                    @if ($errors->has('adress'))
                                                        <span id="name-error" class="error text-danger" for="input-adresse">{{ $errors->first('adress') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="password" class="col-form-label col-lg-2">Contact *</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('contact') ? ' is-invalid' : '' }}" name="contact" id="input-password-confirmation" type="text" value="{{ old('contact') }}" required />
                                                    @if ($errors->has('contact'))
                                                        <span id="contact-error" class="error text-danger" for="input-adresse">{{ $errors->first('contact') }}</span>
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
