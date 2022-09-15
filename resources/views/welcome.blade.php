@extends('layouts.app', ['title' => __('Laravel Dashboard')])

@section('content')
    <div class="account-pages my-5 pt-md-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">

                    <div class="home-wrapper">
                        <img src="{{asset('assets')}}/images/Logo-rofia.jpg" alt="logo-rofia" style="width: 400px; height: 250px">
                        <h4 class="home-text text-uppercase"><span class="rotate">Application Gestion de publicité,Radio ROFIA,Université de Fianarantsoa</span></h4>
                        <br>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary waves-effect waves-light">Commencez maintenant</a>
                        <!-- COUNTDOWN -->
                        <div class="row maintenance-page mt-5 pt-5">
                            <div class="text-center col-md-4">
                                <div class="mainten-box">
                                    <i class="far fa-gem fa-2x mb-3"></i>
                                    <p class="text-uppercase mb-2">A props de cette app?</p>
                                    <p class="text-muted text-m-mode">Cette application nous permet de gerer la publicité au niveau du Radio Rofia, de l'université de Fianarantsoa.</p>
                                </div>
                            </div>
                            <div class="text-center col-md-4">
                                <div class="mainten-box">
                                    <i class="far fa-clock fa-2x mb-3"></i>
                                    <p class="text-uppercase mb-2">Radio Rofia?</p>
                                    <p class="text-muted text-m-mode">Radio Rofia est une entreprise de l'Université de Fianarantsoa que nous avons pu effectuer nos stage.</p>
                                </div>
                            </div>
                            <div class="text-center col-md-4">
                                <div class="mainten-box">
                                    <i class="far fa-envelope fa-2x mb-3"></i>
                                    <p class="text-uppercase mb-2">Ecole Nationale d'Informatique?</p>
                                    <p class="text-muted text-m-mode">Cette application est réalisée par un etudiant de l'ENI de l'Université de Fianarantsoa.. <a href="mailto:no-reply@domain.com" class="text-decoration-underline">eni-univ@yahoo.fr</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- /COUNTDOWN -->
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>

    </div>
@endsection



