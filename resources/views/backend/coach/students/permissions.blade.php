@extends("layouts.coach-master")

@section("addheaderscript")

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/form-upload.css') }}">

@endsection

@section("content")

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=" {{ url('coach-admin') }} ">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Bénéficiers : Permissions</li>
            </ol>
            <form method="post" action=" {{ url('coach-admin/givepermissions') }} " enctype="multipart/form-data" >
                {{ csrf_field() }}
            <div class="box_general padding_bottom">

                <div class="row">
                    <div class="col-md-12 text-center">
                        @if($user->role == 1)
                                @php $personne = geStudentByUSER_Id($user->id) @endphp
                            @else
                                @php $personne = getCoachByUSER_Id($user->id) @endphp
                        @endif

                        <h5>Choisissez le(s) formation(s) sur lesquels vous souhaitez affecter pour : {{ $personne->nom.' '.$personne->prenom }}</h5>

                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <div class="col-md-12">
                        <div class="row">
                        @foreach( $formations as $obj)

                            <div class="col-md-4">
                                <div class="custom-control custom-checkbox">
                                    <input style="width: 22px; height: 25px;" @if(test_formation_user_ByIduser_and_Idformation( $user->id, $obj->id)) checked  @endif type="checkbox" id="customCheckbox{{ $obj->id }}" name="formations_ids[]" value="{{ $obj->id }}">
                                    <label for="customCheckbox{{ $obj->id }}" class="custom-control-label ml-2"> Formation : {{ $obj->titre }} </label>
                                </div>
                            </div>

                        @endforeach
                        </div>
                    </div>
                </div>
                <!-- /row-->
                <div class="row">
                    <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Donner l'accès"></p>

                </div>
            </div>
            <!-- /box_general-->
        </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection
