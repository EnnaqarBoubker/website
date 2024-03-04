@extends("layouts.coach-master")

@section("content")
    <div class="content-wrapper">
        <div class="container-fluid">
            @if( session()->has('success') )
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url("coach-admin") }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Gérer les consultations</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="mb-3">
                <a href="{{ url("coach-admin/consultations/ajouter") }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter une consultation</a>
            </div>
            <div class="card mb-3">

                <div class="card-header">
                    <i class="fa fa-table"></i> Liste des consultations</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Image</th>
                                <th>Nom du consultation</th>
                                <th>Type de consultation</th>
                                <th>Catégorie de consultation</th>
                                <th>Prix</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $count = 1
                            @endphp

                            @foreach($consultations as $obj)
                            <tr>
                                <td style="width: 5%;">#{{ $count++ }}</td>
                                <td style="width: 20%;"><img src="{{ asset('assets/consultations/'.$obj->image) }}" alt="" width="80%" ></td>
                                <td style="width: 20%;">{{ $obj->titre }}</td>
                                <td style="width: 15%;">
                                    @if($obj->type == 1)
                                       Sur place
                                    @elseif($obj->type == 2)
                                       En Ligne
                                    @else
                                        En Live
                                    @endif
                                </td>
                                <td style="width: 15%;">@if( existe_categorie($obj->categorie_id )) {{ $obj->categorie->nom }} @else Aucune catégorie séléctionner @endif </td>
                                <td style="width: 15%;">
                                    @if($obj->new_prix > 0)
                                        <del> {{ $obj->prix }} Dhs</del>
                                        <hr>
                                        {{ $obj->new_prix }} Dhs
                                    @else
                                        {{ $obj->prix }} Dhs
                                    @endif
                                </td>

                                <td style="width: 15%;">
                                    @if($obj->status == 1)
                                    <i class="read">Afficher</i>
                                    @else
                                        <i class="unread">Non Afficher</i>
                                    @endif
                                </td>
                                <td style="width: 15%;">
                                    <a href="{{ url("coach-admin/consultations/".$obj->id."/edit") }}" class="btn btn-primary btn-sm col-12 mb-1"><i class="fa fa-edit"></i> Modifier</a>

                                    <button data-id="{{ $obj->id }}" type="submit" class="delete btn btn-danger btn-sm col-12 mb-1" data-toggle="modal"
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
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer la consultation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="confirmed" action="" method="post">

                                            {{ csrf_field() }}
                                            {{ method_field("DELETE") }}
                                            <input type="hidden" id="id" name="id">
                                            <h5 class="text-center">Êtes-vous sûr de vouloir supprimer cette consultation ?</h5>
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

        $('#confirmed').attr('action' , "{{ url('coach-admin/consultations') }}" +"/"+id );

    });
</script>
<!-- /container-wrapper-->