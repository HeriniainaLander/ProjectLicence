@extends('layouts.app')

@section('content')
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-header bg-img p-5 position-relative">
                            <div class="bg-overlay"></div>
                            <br>
                            <br>
                        </div>
                        <div class="card-body p-4 mt-2">
                            <form class="p-3" method="POST" action="{{ route('password.email') }}" novalidate>
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <div class="form-group mb-0">
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Entrer E-mail" autofocus>
                                        <span class="input-group-append"> <button type="submit" class="btn btn-primary waves-effect waves-light">{{ __('Réinitialiser') }}</button> </span>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-sm-12 text-center">
                                        <a href="{{ route('login') }}">{{ __('Se connecter !') }}</a>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                </div>
                <!-- end col -->
@endsection

