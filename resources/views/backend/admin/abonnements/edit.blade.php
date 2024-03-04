@extends("layouts.admin-master")

@section("content")

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Effectuer un abonnement</li>
            </ol>
            <form method="post" action="{{ url("admin/abonnements/".$abonnement->id) }}">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                    </div>
                    <!-- /row-->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nom du Coach <span class="required">*</span></label>
                                <select class="form-control"  required name="coach_id" id="coach_id">
                                    <option value="">--Sélécionnez--</option>
                                    @foreach($coachs as $coach)
                                        <option @if ($coach->id == $abonnement->coach_id) selected @endif value="{{ $coach->id }}">{{ $coach->prenom }} {{ $coach->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Le Pack <span class="required">*</span></label>
                                <select class="form-control"  required name="pack_id" id="pack_id">
                                    <option value="">--Sélécionnez--</option>
                                    @foreach($packs as $pack)
                                        <option @if ($pack->id == $abonnement->pack_id) selected @endif value="{{ $pack->id }}">{{ $pack->nom }} ({{ $pack->duree }} Mois)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>La date de début <span class="required">*</span></label>
                                <input type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime( $abonnement->date_debut)) }}" required name="date_debut" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>La date de fin <span class="required">*</span></label>
                            <input type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime( $abonnement->date_fin)) }}" required name="date_fin" class="form-control">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Statut <span class="required">*</span></label>
                                <select required name="status" class="form-control" id="status">
                                    <option @if( $abonnement->status ==  1) selected @endif  value="1">Afficher</option>
                                    <option @if( $abonnement->status ==  0) selected @endif value="0">Non Aficher</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Enregistrer"></p>
                    </div>
                </div>
                <!-- /box_general-->


            </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection