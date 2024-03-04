@extends("layouts.admin-master")

@section("content")

    <div class="content-wrapper">
        <div class="container-fluid">
            @if( session()->has('success') )
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
             @if( session()->has('error') )
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
            @endif
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Gérer les Abonnements</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="mb-3">
                <a href="{{ url("admin/abonnements/ajouter") }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter un Abonnement</a>
            </div>
            <div class="card mb-3">

                <div class="card-header">
                    <i class="fa fa-table"></i> Liste des Abonnements</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Infos du coach</th>
                                <th>Pack Actuél</th>
                                <th>Statut</th>
                                <th>Durée</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count =1 @endphp
                            @foreach ($abonnements as $obj)
                            <tr>
                                <td style="width: 5%;">{{ $count++ }}</td>
                                <td style="width: 20%;">{{ $obj->coach->nom }} {{ $obj->coach->prenom }}
                                    <hr>
                                    Téléphone : {{ $obj->coach->tel }}
                                </td>
                                <td style="width: 15%;">{{ $obj->pack->nom }} ({{ $obj->pack->duree }} Mois)</td>
                                <td style="width: 15%;">

                                    @if($obj->status == 1)
                                        <i class="read">Actif</i>
                                    @else
                                        <i class="unread">Non Actif</i>
                                    @endif
                                </td>
                                <th style="width: 25%;">
                                    Début : {{ date('d/m/Y H:i:s', strtotime( $obj->date_debut)) }}
                                    <hr>
                                    Fin: {{ date('d/m/Y H:i:s', strtotime( $obj->date_fin)) }}
                                </th>
                                <td style="width: 15%;">
{{--                                    <a href="{{ url("admin/abonnements/".$obj->id."/edit") }}" class="btn btn-success btn-sm col-12 mb-1"><i class="fa fa-eye"></i> Détails</a>--}}
                                    <a href="{{ url("admin/abonnements/".$obj->id."/edit") }}" class="btn btn-primary btn-sm col-12 mb-1"><i class="fa fa-edit"></i> Modifier</a>

                                    <button type="submit" class="btn btn-danger btn-sm col-12 mb-1" data-toggle="modal"
                                            data-target="#deleteModal" ><i class="fa fa-trash"></i> Supprimer</button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- Delete Warning Modal -->
                        <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer L'abonnement</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" id="confirmed" method="post">

                                            {{ csrf_field() }}

                                            {{ method_field("DELETE") }}

                                            <input type="hidden" id="id" name="id">

                                            <h5 class="text-center">Êtes-vous sûr de vouloir supprimer cette abonnement?</h5>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Annuler</button>
                                                <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Delete Modal -->
                    </div>
                </div>
            </div>
            <!-- /tables-->
        </div>
        <!-- /container-fluid-->
    </div>

    <!-- /container-wrapper-->
@endsection
<script src="{{ asset("assets/frontend") }}/js/jquery-2.2.4.min.js"></script>

<script>

    $(document).on('click','.delete',function(){

        let id = $(this).attr('data-id');

        $('#id').val(id);

        $('#confirmed').attr('action' , "{{ url('admin/abonnements') }}" +"/"+id );

    });
</script>
<!-- /container-wrapper-->