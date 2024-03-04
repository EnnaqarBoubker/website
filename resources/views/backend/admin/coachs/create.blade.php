@extends("layouts.admin-master")

@section("addstyles")
    <script src="{{asset("assets/backend/js")}}/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea.editor',
            skin: 'bootstrap',
            // plugins: 'lists, link, image, media',
            plugins: 'lists, link',
            toolbar: 'h1 h2 h3 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false
        });
    </script>
@endsection

@section("content")

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
{{--            @if(count($errors))--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    <ul>--}}
{{--                        @foreach($errors->all() as $message)--}}
{{--                            <li>--}}
{{--                                {{ $message }}--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            @endif--}}
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Ajouter un Coach</li>
            </ol>
            <form method="post" action="{{url("admin/coachs")}}" enctype="multipart/form-data" >
            {{ csrf_field() }}

                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-user"></i> Détails Profil </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    <label class="col-12">Votre photo</label>
                                    <img src="{{asset('assets/backend/img/avatar1.jpg')}}" id="image1" width="150px" alt="">
                                    <input type="file" class="form-control mt-3" name="photo" name="photo" onchange="readURL1(this);">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mot de passe <span class="required">*</span></label>
                                            <input type="password" name="password"  required class="form-control" placeholder="Votre mot de passe">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Confirmer le mot de passe <span class="required">*</span></label>
                                            <input type="password" name="repassword" required class="form-control" placeholder="Re tappez le mot de passe">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 add_top_30">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nom <span class="required">*</span></label>
                                        <input type="text" required class="form-control" name="nom" placeholder="Votre nom">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Prénom <span class="required">*</span></label>
                                        <input type="text" required name="prenom" class="form-control" placeholder="Votre prénom">
                                    </div>
                                </div>
                            </div>

                            <!-- /row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone <span class="required">*</span></label>
                                        <input type="text" required name="tel" class="form-control" placeholder="Votre téléphone">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email <span class="required">*</span></label>
                                        <input type="email" required name="email" class="form-control" placeholder="Votre email">
                                    </div>
                                </div>
                            </div>

                            <!-- /row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Informations personnelles</label>
                                        <textarea style="height:100px;" name="info_pers" class="form-control" placeholder="Votre Informations personnelles"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- /row-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Spécialités <a href="#0" data-toggle="tooltip" data-placement="top" title="Separated by commas"><i class="fa fa-fw fa-question-circle"></i></a></label>
                                        <input type="text" name="specialities" class="form-control" placeholder="Ex: informatique, développement...">
                                    </div>
                                </div>
                            </div>
                            <!-- /row-->
                        </div>
                    </div>
                </div>

                <!-- /box_general-->

                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-share-alt"></i>Réseaux sociaux</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Facebook</label>
                                <input type="text" name="url_fb" class="form-control" placeholder="Coller/tappez votre lien ici...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Instagram</label>
                                <input type="text" name="url_inst" class="form-control" placeholder="Coller/tappez votre lien ici...">
                            </div>
                        </div>

                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Youtube</label>
                                <input type="text" name="url_you" class="form-control" placeholder="Coller/tappez votre lien ici...">
                            </div>
                        </div>
                    </div>

                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Linkdin</label>
                                <input type="text" name="url_link" class="form-control" placeholder="Coller/tappez votre lien ici...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Twitter</label>
                                <input type="text" name="url_tw" class="form-control" placeholder="Coller/tappez votre lien ici...">
                            </div>
                        </div>
                    </div>
                    <!-- /row-->

                </div>
                <!-- /box_general-->

                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file-text"></i>Diplômes & Biographie</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Biographie</label>
                                <textarea rows="3" name="bio" class="form-control editor" placeholder="Expliquer ici"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Diplômes</label>
                                <textarea rows="3" name="diplomes" class="form-control editor" placeholder="Expliquer ici"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /row-->
                </div>

                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-star"></i>Autres Informations professionnels</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Ville</label>
                                <input type="text" name="ville" class="form-control" placeholder="Tappez votre ville ici">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Adresse Professionnel</label>
                                <textarea rows="2" name="adresse" class="form-control" placeholder="Tappez votre adresse professionnel ici"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>WhatsApp</label>
                                <input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp : 2126xxxxxxxx">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Téléphone Fix</label>
                                <input type="text" name="fixe" class="form-control" placeholder="Tél fix : 2125xxxxxxxx">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" name="fax" class="form-control" placeholder="Fax : 2125xxxxxxxx">
                            </div>
                        </div>
                    </div>
                    <!-- /row-->

                </div>

                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-star"></i>Les Informations du paiement</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Email PayPal</label>
                                <input type="text" name="paypal" class="form-control" placeholder="Tappez votre email paypal ici">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>RIB Bancaire</label>
                                <input type="text" name="rib" class="form-control" placeholder="Tappez votre RIB bancaire ici">
                            </div>
                        </div>
                    </div>


                    <!-- /row-->
                </div>
                <!-- /box_general-->

                <p><input type="submit" class="btn_1 medium" value="Enregistrer"></p>

            </form>
        </div>
        <!-- /.container-fluid-->
    </div>
    <!-- /.container-wrapper-->
@endsection

@section("addscript")
    <script src="{{asset("assets/backend/js")}}/jquery-3.4.1.slim.min.js" ></script>
    <script src="{{asset("assets/backend/js")}}/popper.min.js"></script>
    <script src="{{asset("assets/backend/js")}}/bootstrap.min.js"></script>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#image1').attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);

            }

        }
    </script>
@endsection
