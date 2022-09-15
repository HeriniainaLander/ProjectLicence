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
                            <h4 class="page-title">Table Evaluation</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Evaluation</a></li>
                                    <li class="breadcrumb-item"><a href="#">table</a></li>
                                    <li class="breadcrumb-item active">liste</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <h3 class="card-title">Evaluation</h3>
                                            <p>Recherche de commande par date</p>
                                        </div>
                                        <div class="col-lg-6 ">
                                            <form method="POST" action="{{ route('evaluation.date') }}">
                                            {{ csrf_field()}}
                                            {{ method_field('POST') }}
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <input type="text" name="debut" class="form-control" placeholder="Début" data-provide="datepicker" autocomplete="off">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <input type="text" name="fin" class="form-control" placeholder="Fin" data-provide="datepicker" autocomplete="off">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4">
                                                                <div class="input-group">
                                                                    <button class="btn btn-outline-primary waves-effect waves-light" type="submit">Evaluer</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-3">
                                            <p>
                                                <span class="card-title">TOTAL COMMANDE: </span>
                                                <span class="badge badge-pill badge-danger">{{ $Total_commande ?? '0'}}</span>
                                            </p>
                                            <p>
                                                <span class="card-title">MONTANT TOTAL: </span>
                                                <span class="badge badge-danger">{{ $Montant ?? '0'}} Ariary</span>
                                            </p>
                                        </div>                                      
                                    </div>
                                        
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="table-responsive">
                                                    <table class="table mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>IdClient</th>
                                                                <th>Client</th>
                                                                <th>DateCommande</th>
                                                                <th>Titre</th>
                                                                <th>Nombre de diffusion</th>
                                                                <th>Date de Commande</th>
                                                                <th>Emetteur</th>
                                                                <th>Recepteur</th>                        
                                                                <th>net à payer</th>
                                                            </tr>   
                                                        </thead>
                                                        <tbody>
                                                            @forelse($commandes as $commande)
                                                                <tr>
                                                                    <td>{{ $commande->id ?? ''}}</td>
                                                                    <td>{{ $commande->client->nom ?? '' }}</td>
                                                                    <td>{{ $commande->offre->libelle ?? '' }}</td>
                                                                    <td>{{ $commande->diffusion->titre ?? '' }}</td>
                                                                    <td>{{ $commande->diffusion->nb_diffusion ?? '' }}</td>
                                                                    <td>{{ $commande->date_commande ?? ''}}</td>
                                                                    <td>{{ $commande->nom_emetteur ?? ''}}</td>
                                                                    <td>{{ $commande->nom_recepteur ?? ''}}</td>
                                                                    <td>{{ $commande->net_a_payer ?? ''}} Ariary</td>                                                        
                                                                </tr>
                                                            @empty
                                                            <tr>
                                                                <td class="text-center">
                                                                    <p class="bg-danger text-white p-1">Aucun données trouvées sur la table</p>
                                                                </td>
                                                            </tr>
                                                            @endforelse
                                                        </tbody> 
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End row -->
                <!-- End Row -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->

    </div>

    @push('script')
        <!-- Table datatable css -->
        <link href="{{ asset('assets') }}/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets') }}/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
        <link href="{{ asset('assets') }}/libs/bootstrap-datepicker/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />

        <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
        @include('vendor.flashy.message')
        <script>
            $(document).on('click','.delete',function(){
                let name = $(this).attr('data-name');
                let url = $(this).attr('data-url');
                console.log(name);
                $('.message').text('Voulez-vous vraiment supprimer ' + name + ' ?');
                $('#delete-form').attr('action', url);
            });
        </script>

        <!-- third party js -->
         <!-- third party js -->
         <script src="{{ asset('assets') }}/libs/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

    @endpush


    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


@endsection
