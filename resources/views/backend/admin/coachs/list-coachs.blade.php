@extends("layouts.admin-master")

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
                    <a href="{{ url("admin") }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Gérer les coachs</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="mb-3">
                <a href="{{ url("admin/coachs/ajouter") }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter un Coach</a>
            </div>
            <div class="card mb-3">

                <div class="card-header">
                    <i class="fa fa-table"></i> Liste des Coachs</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Photo</th>
                                <th>Nom & Prénom</th>
                                <th>Statut</th>
                                <th>Date de création</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $count = 1
                            @endphp

                            @foreach($coachs as $obj)
                            <tr>
                                <td style="width: 5%;">#{{ $count++ }}</td>
                                <td style="width: 20%;" class="text-center"><img src="{{ asset( 'assets/coachs/'.$obj->photo) }}" alt="" width="80%" ></td>
                                <td style="width: 30%;">{{ $obj->nom }} {{ $obj->prenom }}</td>

                                <td style="width: 15%;">
                                    @if($obj->status == 1)
                                    <i class="read">Actif</i>
                                    @else
                                        <i class="unread">Non Actif</i>
                                    @endif
                                </td>
                                <td style="width: 20%;">{{ $obj->created_at }}</td>
                                <td style="width: 15%;">
                                    <a href="{{ url("admin/coachs/".$obj->id."/edit") }}" class="btn btn-primary btn-sm col-12 mb-1"><i class="fa fa-edit"></i> Modifier</a>

                                    <button type="submit" class="delete btn btn-danger btn-sm col-12 mb-1" data-toggle="modal"
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
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer Le Coach</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="confirmed" action="" method="post">

                                            {{ csrf_field() }}
                                            {{ method_field("DELETE") }}
                                            <input type="hidden" id="id" name="id">
                                            <h5 class="text-center">Êtes-vous sûr de vouloir supprimer ce Coach?</h5>
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
    <script src="{{ asset("assets/frontend") }}/js/jquery-2.2.4.min.js"></script>

    <script>

        $(document).on('click','.delete',function(){

            let id = $(this).attr('data-id');

            $('#id').val(id);

            $('#confirmed').attr('action' , "{{ url('admin/coachs') }}" +"/"+id );

        });
    </script>
@endsection
