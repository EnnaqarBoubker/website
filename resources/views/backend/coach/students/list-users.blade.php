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
                <li class="breadcrumb-item active">Gérer les bénéficiers</li>
            </ol>
            <!-- Example DataTables Card-->
            <div class="mb-3">
{{--                <a href="{{ url("coach-admin/formations/ajouter") }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Ajouter une formation</a>--}}
            </div>
            <div class="card mb-3">

                <div class="card-header">
                    <i class="fa fa-table"></i> Liste des coaches & bénéficiers</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom Complet</th>
                                <th>Type d'utilisateur</th>
{{--                                <th>Statut</th>--}}
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                 $cmpt = 1;

                            @endphp
{{--                            {{ count($userslist) }}--}}
                            @foreach($userslist as $std)

                            <tr>
                                <td style="width: 5%;">#{{ $cmpt }}</td>
                                <td style="width: 20%;">
{{--                                        {{ $std->id }}--}}
{{--                                    @if( $std-> role == 1)--}}

{{--                                        @php--}}
{{--                                            $student =  geStudentByUSER_Id( $std->id);--}}
{{--                                        @endphp--}}

                                        {{ strtoupper($std->nom).' '.strtoupper($std->prenom) }}

{{--                                    @elseif( $std->role == 2)--}}
{{--                                        @php--}}
{{--                                            $coach=  getCoachByUSER_Id($std->id);--}}
{{--                                        @endphp--}}
{{--                                        {{ strtoupper($coach->nom).' '.strtoupper($coach->prenom) }}--}}

{{--                                    @endif--}}
                                </td>
                                <td style="width: 15%;">
{{--                                    @if($std->role == 1)--}}
                                       Bénéficier
{{--                                    @elseif($std->role == 2)--}}
{{--                                       Coach--}}
{{--                                    @else--}}
{{--                                        Admin--}}
{{--                                    @endif--}}
                                </td>
{{--                                <td style="width: 15%;">--}}
{{--                                    @if($std->status == 1)--}}
{{--                                    <i class="read">Afficher</i>--}}
{{--                                    @else--}}
{{--                                        <i class="unread">Non Afficher</i>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
                                <td style="width: 15%;">
                                    <button data-id="{{ $std->id }}" type="submit" class="delete btn btn-danger btn-sm col-5 mb-1" data-toggle="modal"
                                            data-target="#deleteModal" ><i class="fa fa-trash"></i> Supprimer</button>

                                    <a href="{{ url("coach-admin/students-permessions/".$std->user_id) }}" class="btn btn-primary btn-sm col-6 mb-1"><i class="fa fa-lock"></i> Permissions</a>
                                </td>
                            </tr>
                            @php

                                $cmpt++;

                            @endphp

                            @endforeach
                            </tbody>
                        </table>

                        <!-- Delete Warning Modal -->
                        <div class="modal modal-danger fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="Delete" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Supprimer Le Bénéficiaire</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="confirmed" action="" method="post">

                                            {{ csrf_field() }}
{{--                                            {{ method_field("DELETE") }}--}}

                                            <input type="hidden" id="id" name="id">
                                            <h5 class="text-center">Êtes-vous sûr de vouloir supprimer ce Bénéficiaire ?</h5>
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

        $('#confirmed').attr('action' , "{{ url('coach-admin/student-delete') }}" +"/"+id );

    });
</script>
<!-- /container-wrapper-->