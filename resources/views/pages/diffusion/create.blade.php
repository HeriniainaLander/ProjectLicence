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
                            <h4 class="page-title">Formulaire de Diffusion</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Diffusion</a></li>
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
                                <h3 class="card-title">{{ __('Créer un Diffusion') }}</h3></div>
                            <div class="card-body">
                                <div class="form">
                                    <div class="form">
                                        <form class="cmxform form-horizontal tasi-form" id="signupForm" method="POST" action="{{ route('diffusions.store') }}" autocomplete="off" class="form-horizontal" novalidate>
                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}
                                            <div class="form-group row">
                                                <label for="input-title" class="col-form-label col-lg-2">{{ __('Titre *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('libelle') ? ' is-invalid' : '' }}" type="text"  name="title" id="input-title" value="{{ old('title') }}" required/>
                                                    @if ($errors->has('title'))
                                                        <span id="title-error" class="error text-danger" for="input-title">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-debutDiff" class="col-form-label col-lg-2">{{ __('Debut de Diffusion *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('debutDiff') ? ' is-invalid' : '' }}" name="debutDiff" id="input-debutDiff" type="date" value="{{ old('debutDiff') }}" required />
                                                    @if ($errors->has('debutDiff'))
                                                        <span id="debutDiff-error" class="error text-danger" for="input-debutDiff">{{ $errors->first('debutDiff') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-finDiff" class="col-form-label col-lg-2">{{ __('Fin de Diffusion *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('finDiff') ? ' is-invalid' : '' }}" name="finDiff" id="input-finDiff" type="date" value="{{ old('finDiff') }}" required />
                                                    @if ($errors->has('finDiff'))
                                                        <span id="finDiff-error" class="error text-danger" for="input-finDiff">{{ $errors->first('finDiff') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-heureDiff" class="col-form-label col-lg-2">{{ __('Heure de Diffusion *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('heureDiff') ? ' is-invalid' : '' }}" name="heureDiff" id="input-heureDiff" type="text" value="{{ old('heureDiff') }}" required />
                                                    @if ($errors->has('heureDiff'))
                                                        <span id="heureDiff-error" class="error text-danger" for="input-finDiff">{{ $errors->first('heureDiff') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-nbDiff" class="col-form-label col-lg-2">{{ __('Nombre de Diffusion *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('nbDiff') ? ' is-invalid' : '' }}" name="nbDiff" id="input-nbDiff" type="number" value="{{ old('nbDiff') }}" required />
                                                    @if ($errors->has('nbDiff'))
                                                        <span id="nbDiff-error" class="error text-danger" for="input-nbDiff">{{ $errors->first('nbDiff') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="input-quitance" class="col-form-label col-lg-2">{{ __('Quitance *') }}</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control{{ $errors->has('quitance') ? ' is-invalid' : '' }}" name="quitance" id="input-finDiff" type="text" value="{{ old('quitance') }}" required />
                                                    @if ($errors->has('quitance'))
                                                        <span id="finDiff-error" class="error text-danger" for="input-finDiff">{{ $errors->first('quitance') }}</span>
                                                    @endif
                                                </div>
                                            </div>
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
