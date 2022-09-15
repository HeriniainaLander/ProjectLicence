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
                            <h4 class="page-title">Formulaire Commande</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Commande</a></li>
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
                                <h3 class="card-title">{{ __('Créer une nouvelle commande') }}</h3></div>
                            <div class="card-body">
                                <div class="form">
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="{{ route('commandes.store') }}" autocomplete="off" class="form-horizontal" novalidate>
                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="form-group row">
                                                <label for="input-client_id" class="col-form-label col-lg-2">{{ __('Client') }}</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control{{ $errors->has('client') ? ' is-invalid' : '' }}" type="text" id="input-client_id" name="client" value="{{ old('client') }}" required>
                                                        @foreach($clients as $client)
                                                            <option value="{{ $client->id }}">{{  $client->nom }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('client'))
                                                        <span id="name-error" class="error text-danger" for="input-client_id">{{ $errors->first('client') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-offre_id" class="col-form-label col-lg-2">{{ __('Offre') }}</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control{{ $errors->has('offre') ? ' is-invalid' : '' }}" type="text" id="input-offre_id" name="offre" value="{{ old('offre') }}" required>
                                                        @foreach($offres as $offre)
                                                            <option value="{{ $offre->id }}">{{ $offre->libelle }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('offre'))
                                                        <span id="name-error" class="error text-danger" for="input-offre_id">{{ $errors->first('offre') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-diffusion" class="col-form-label col-lg-2">{{ __('Diffusion') }}</label>
                                                <div class="col-lg-10">
                                                    <select class="form-control{{ $errors->has('diffusion') ? ' is-invalid' : '' }}" type="text" id="input-diffusion" name="diffusion" value="{{ old('diffusion') }}" required>
                                                        @foreach($diffusions as $diffusion)
                                                            <option value="{{ $diffusion->id }}">{{ $diffusion->numQuitance }}-{{ $diffusion->titre }}</option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('diffusion'))
                                                        <span id="name-error" class="error text-danger" for="input-diffusion">{{ $errors->first('diffusion') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-date_commande" class="col-form-label col-lg-2">{{ __('Date du commande') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('dateCmd') ? ' is-invalid' : '' }}" type="date"  name="dateCmd" forma id="input-date_commande" value="{{ old('dateCmd') }}" required/>
                                                    @if ($errors->has('dateCmd'))
                                                        <span id="date_commande-error" class="error text-danger" for="input-date_commande">{{ $errors->first('dateCmd') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-nom_emetteur" class="col-form-label col-lg-2">{{ __('Emetteur') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('emetteur') ? ' is-invalid' : '' }}" name="emetteur" id="input-nom_emetteur" type="text" value="{{ old('emetteur') }}" required />
                                                    @if ($errors->has('emetteur'))
                                                        <span id="nom_emetteur-error" class="error text-danger" for="input-nom_emetteur">{{ $errors->first('emetteur') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-nom_recepteur" class="col-form-label col-lg-2">{{ __('Recepteur') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('recepteur') ? ' is-invalid' : '' }}" name="recepteur" id="input-nom_recepteur" type="text" value="{{ old('recepteur') }}" required />
                                                    @if ($errors->has('recepteur'))
                                                        <span id="nom_recepteur-error" class="error text-danger" for="input-nom_recepteur">{{ $errors->first('recepteur') }}</span>
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
