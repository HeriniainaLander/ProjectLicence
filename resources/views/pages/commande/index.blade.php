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
                            <h4 class="page-title">Table Commande</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Commande</a></li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des Commandes</h3>
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Offre</th>
                                        <th>Titre</th>
                                        <th>dateCmd</th>
                                        <th>Emetteur</th>
                                        <th>Recepteur</th>
                                        <th>Net à payer</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($commandes as $commande)
                                        <tr>
                                            <td>{{ $commande->id }}</td>
                                            <td>{{ $commande->client->nom ?? '' }}</td>
                                            <td>{{ $commande->offre->libelle ?? '' }}</td>
                                            <td>{{ $commande->diffusion->titre ?? '' }}</td>
                                            <td>{{ $commande->date_commande }}</td>
                                            <td>{{ $commande->nom_emetteur }}</td>
                                            <td>{{ $commande->nom_recepteur }}</td>
                                            <td>{{ $commande->net_a_payer }} Ariary</td>
                                            <td>
                                                <div class="btn-group mb-2">
                                                    <a href="{{ route('commandes.edit', $commande->id)  }}" class="btn btn-outline-secondary waves-effect btn-sm" rel="tooltip" title="modifier">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-outline-secondary waves-effect btn-sm delete" data-toggle="modal" data-url="{!! URL::route('commandes.destroy', $commande->id) !!}"  data-name="{{ $commande->client->nom ?? '' }}" data-target="#card-modal" rel="tooltip" title="supprimer">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- End Row -->
                <!-- Modal -->
                <div id="card-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content p-0 b-0">
                            <div class="card card-color mb-0">
                                <div class="card-header bg-primary">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h3 class="card-title text-white mt-1 mb-0">Suppression</h3>
                                </div>
                                <form id="delete-form" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div class="card-body">
                                        <h4 class="text-center message"></h4>
                                        <p class="text-center ">La suppression de cet element est definitif donc vous ne pouvez plus recuperer cet element après la suppression </p>
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Non</button>
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Oui</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

            </div>
            <!-- end container-fluid -->

        </div>
        <!-- end content -->

    </div>

    @push('script')
        <!-- Table datatable css -->
        <link href="{{ asset('assets') }}/libs/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets') }}/libs/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets') }}/libs/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <script src="{{ asset('assets') }}/js/jquery.min.js"></script>
        @include('vendor.flashy.message')
        <script>
            $(document).on('click','.delete',function(){
                let name = $(this).attr('data-name');
                let url = $(this).attr('data-url');
                console.log(name);
                $('.message').text('Voulez-vous vraiment supprimer cette commande de ' + name + ' ?');
                $('#delete-form').attr('action', url);
            });
        </script>

        <!-- third party js -->
        <script src="{{ asset('assets') }}/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="{{ asset('assets') }}/libs/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="{{ asset('assets') }}/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="{{ asset('assets') }}/libs/datatables/responsive.bootstrap4.min.js"></script>>

        <script src="{{ asset('assets') }}/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="{{ asset('assets') }}/libs/datatables/buttons.bootstrap4.min.js"></script>

        <script src="{{ asset('assets') }}/libs/datatables/buttons.html5.min.js"></script>
        <script src="{{ asset('assets') }}/libs/datatables/buttons.print.min.js"></script>

        <!-- Datatables init -->
        <script src="{{ asset('assets') }}/js/pages/datatables.init.js"></script>
    @endpush


    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


@endsection
