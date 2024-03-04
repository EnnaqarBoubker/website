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
                <li class="breadcrumb-item active">Gérer les articles</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="mb-3">
                <a href="{{ url("coach-admin/articles/ajouter") }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter un article </a>
            </div>
            <div class="card mb-3">

                <div class="card-header">
                    <i class="fa fa-table"></i> Liste des articles</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Image</th>
                                <th>Titre d'article</th>
                                <th>Description</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $count = 1
                            @endphp

                            @foreach($articles as $obj)
                            <tr>
                                <td style="width: 5%; ">#{{ $count++ }}</td>
                                <td style="width: 20%; "><img src="{{ asset('assets/articles/'.$obj->image) }}" alt="" width="80%" ></td>
                                <td style="width: 20%; ">{{ $obj->titre }}
                                    <hr>
                                    Date : {{ $obj->date }}
                                </td>

                                <td style="width: 25%; ">
                                    @php
                                        $string =  str_replace("&nbsp;", " ", strip_tags($obj->description));
                                           if (strlen($string) > 150) {
                                               // truncate string
                                               $stringCut = substr($string, 0, 150);
                                               $endPoint = strrpos($stringCut, ' ');

                                               //if the string doesn't contain any space then it will cut without word basis.
                                               $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                               $string .= '...';
                                           }
                                    @endphp
                                    {{ $string }}
                                </td>

                                <td style="width: 15%;">
                                    @if($obj->status == 1)
                                    <i class="read">Afficher</i>
                                    @else
                                        <i class="unread">Non Afficher</i>
                                    @endif
                                </td>

                                <td style="width: 15%;">
                                    <a target="_blank" href="{{ url("details-article/".$obj->id) }}" class="btn btn-success btn-sm col-12 mb-1"><i class="fa fa-eye"></i> Détails</a>
                                    <a href="{{ url("coach-admin/articles/".$obj->id."/edit") }}" class="btn btn-primary btn-sm col-12 mb-1"><i class="fa fa-edit"></i> Modifier</a>

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
                                            <h5 class="text-center">Êtes-vous sûr de vouloir supprimer cette formation ?</h5>
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

        $('#confirmed').attr('action' , "{{ url('coach-admin/articles') }}" +"/"+id );

    });
</script>
<!-- /container-wrapper-->