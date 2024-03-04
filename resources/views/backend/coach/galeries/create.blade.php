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
                <li class="breadcrumb-item active">Ajouter un source au galerie</li>
            </ol>
            <form method="post" action=" {{ url('coach-admin/galeries') }} ">
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
                            <input type="text" class="form-control" placeholder="votre titre ici" id="titre" name="titre">
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
                                <label> <input required type="radio" value="1" name="type"> Image</label>
                            </div>

                            <div class="radio-inline">
                                <label> <input required type="radio" value="2" name="type"> Vidéo</label>
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
                            <input type="text" required class="form-control" placeholder="votre lien ici" id="lien" name="lien">
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
                                <option value="1"> Afficher</option>
                                <option value="0"> Non Afficher</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <!-- /row-->
                <div class="row">
                    <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Ajouter au galerie"></p>
                </div>

            </div>
            <!-- /box_general-->
        </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection
