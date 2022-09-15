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
                            <h4 class="page-title">Formulaire Utilisateur</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Utilisateur</a></li>
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
                                <h3 class="card-title">{{ __('Créer un nouveau Utilisateur') }}</h3></div>
                            <div class="card-body">
                                <div class="form">
                                    <div class="form">
                                    <form class="cmxform form-horizontal tasi-form" method="POST" action="{{ route('register') }}" novalidate>
                                @csrf

                                <div class="form-group mb-3">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nom" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="E-mail" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="{{ __('Mot de passe...') }}" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="{{ __('Confirmation Mot de passe...') }}" autocomplete="new-password">
                                </div>

                                <div class="form-group mb-3">
                                    <select  class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{ old('type') }}" required autocomplete="type" autofocus>
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="Utilisateur">Utilisateur</option>
                                    </select>

                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input id="name" type="file" class="form-control @error('name') is-invalid @enderror" name="avatar" value="{{ old('avatar') }}" required autocomplete="avatar" placeholder="avatar" autofocus>

                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group text-center mt-5 mb-4">
                                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> {{ __('S\' inscrire') }} </button>
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