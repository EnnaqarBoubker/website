@extends("layouts.coach-master")

@section("content")

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href=" {{ url('coach-admin') }} ">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Modifier la source</li>
            </ol>
            <form method="post" action=" {{ url('coach-admin/galeries/'. $galerie->id) }} " >
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="titre">Le titre </label>
                                <input type="text" class="form-control" value="{{ $galerie->titre }}" placeholder="votre titre ici" id="titre" name="titre">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Le type <span class="required">*</span></label>

                                <div class="radio-inline">
                                    <label> <input required type="radio" value="1" name="type" @if($galerie->type ==  1 ) checked @endif > Image</label>
                                </div>

                                <div class="radio-inline">
                                    <label> <input required type="radio" value="2" name="type" @if($galerie->type ==  2 ) checked @endif > Vidéo</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lien">Le Lien <span class="required">*</span></label>
                                <input type="text" value="{{ $galerie->lien }}" required class="form-control" placeholder="votre lien ici" id="lien" name="lien">
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Disponibilité sur le Site <span class="required">*</span></label>
                                <select name="status" class="form-control" id="status" required>
                                    <option @if($galerie->status ==  1 ) selected @endif value="1"> Afficher</option>
                                    <option @if($galerie->status ==  0 ) selected @endif value="0"> Non Afficher</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Mise à jour"></p>
                    </div>
                </div>
                <!-- /box_general-->
            </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection

@section("addfooterscript")
    <script src="{{asset("assets/backend/js")}}/jquery-3.4.1.slim.min.js" ></script>
    <script src="{{asset("assets/backend/js")}}/popper.min.js"></script>
    <script src="{{asset("assets/backend/js")}}/bootstrap.min.js"></script>
@endsection