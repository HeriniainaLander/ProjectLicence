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
                            <form class="p-3" method="POST" action="{{ route('login') }}" novalidate>
                                @csrf
                                <div class="form-group mb-3">
                                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Username" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                                <div class="form-group text-center mt-5 mb-4">
                                    <button class="btn btn-primary waves-effect width-md waves-light" type="submit"> Se connecter </button>
                                </div>


                            </form>

                        </div>
                        <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <!-- end row -->

                </div>
                <!-- end col -->
@endsection
