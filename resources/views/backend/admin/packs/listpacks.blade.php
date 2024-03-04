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
                <li class="breadcrumb-item active">Gérer les packs</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="mb-3">
                <a href="{{ url("admin/packs/ajouter") }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter un pack</a>
            </div>
            <div class="card mb-3">

                <div class="card-header">
                    <i class="fa fa-table"></i> Liste des packs</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom du pack</th>
                                <th>Durée du pack</th>
                                <th>Types de formations	</th>
                                <th>Nbr des vidéos	</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $count = 1
                            @endphp

                            @foreach($packs as $obj)
                            <tr>
                                <td style="width: 5%;">#{{ $count++ }}</td>
                                <td style="width: 20%;">{{ $obj->nom }}</td>
                                <td style="width: 15%;">{{ $obj->duree }}</td>
                                <td style="width: 20%;">{{ $obj->types }}</td>
                                <td style="width: 15%;">{{ $obj->nbr_videos }}</td>

                                <td style="width: 20%;">
                                    @if($obj->status == 1)
                                    <i class="read">Afficher</i>
                                    @else
                                        <i class="unread">Non Afficher</i>
                                    @endif
                                </td>
                                <td style="width: 15%;">
                                    <a href="{{ url("admin/packs/".$obj->id."/edit") }}" class="btn btn-primary btn-sm col-12 mb-1"><i class="fa fa-edit"></i> Modifier</a>
                                    <form action="{{ url("admin/packs/".$obj->id) }}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field("DELETE") }}
                                        <button type="submit" class="btn btn-danger btn-sm col-12 mb-1" ><i class="fa fa-trash"></i> Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /tables-->
        </div>
        <!-- /container-fluid-->
    </div>
    <script>
        $(document).on('click','.delete',function(){
            let id = $(this).attr('data-id');
            $('#id').val(id);
        });
    </script>
    <!-- /container-wrapper-->
@endsection