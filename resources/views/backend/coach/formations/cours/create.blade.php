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
                <li class="breadcrumb-item active">Ajouter un cours</li>
            </ol>
            <form method="post" id="imageupload" action=" {{ url('coach-admin/formations-courses') }} " enctype="multipart/form-data" >
                {{ csrf_field() }}
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                </div>


                <div class="row">

                    <div class="col-md-8">
                        <div class="form-group @if( $errors->get('titre')) has-error @endif ">
                            <label>Titre du cours <span class="required">*</span></label>
                            <input type="text" value="{{ old('titre') }}" placeholder="Tappez le titre du cours ici..." class="form-control"  required name="titre">
                            @if( $errors->get('titre'))
                                @foreach( $errors->get('titre') as $message)
                                    <li class="required">
                                        {{ $message }}
                                    </li>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Choisissez le Type du cours <span class="required">*</span></label>
                        <div class="form-group radio_input">
                            <label><input type="radio" id="type_v" value="1" style="width: 25px; height: 22px" required name="type_cours" class="icheck"><strong> Vidéo</strong></label>
                            <label><input type="radio" id="type_p" value="2" style="width: 25px; height: 22px" required name="type_cours" class="icheck"><strong> Fichier(PDF/WORD/IMAGE)</strong></label>
                        </div>
                    </div>
                </div>

                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-video-camera"></i>Videos/Fichier</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Choisissez le Type d'upload <span class="required">*</span></label>
                            <div class="form-group radio_input">
                                <label><input type="radio" id="type_tr" value="1" style="width: 25px; height: 22px" checked required name="type_upload" class="icheck"><strong> Transfert </strong></label>
                                <label><input type="radio" id="type_up" value="2" style="width: 25px; height: 22px" required name="type_upload" class="icheck"><strong> Téléchargement</strong></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6>Tappez le nom du vidéo</h6>
                            <input type="text" id="video_name" class="form-control" placeholder="exemple : centre-mikdak-video-testenom.mp4" name="video_name">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Cours sous forme du vidéo (Max : 128 Mo)</h6>
                            <table id="pricing-list-container" style="width:100%;">
                                <tbody><tr class="pricing-list-item">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="file" id="video" name="video_url" class="form-control" placeholder="Video title">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                        <div class="col-md-6">
                            <h6>Cours sous forme du PDF/WORD/IMAGE (Max : 128 Mo)</h6>
                            <table id="pricing-list-container2" style="width:100%;">
                                <tbody><tr class="pricing-list-item">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="file" id="pdf" name="pdf_url" class="form-control" placeholder="Fichier title">
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                    </div>
                    <!-- /row-->
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5>Choisissez le(s) chapitre(s) sur lesquels vous souhaitez que cette leçon apparaisse</h5>
                    </div>
                    <div class="col-md-12">
                        @foreach($formations as $obj)
                            <div class="header_box version_2">
                                <h4 class="bg-light py-3 px-4">Formation : {{ $obj->titre }}</h4>
                            </div>
                            <div class="row">
                                @foreach($obj->chapitres as $ch)
                                <div class="col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input style="width: 22px; height: 25px;" type="checkbox" id="customCheckbox{{ $obj->id }}_{{ $ch->id }}" name="chapitres[]" value="{{ $ch->id }}">
                                        <label for="customCheckbox{{ $obj->id }}_{{ $ch->id }}" class="custom-control-label ml-2"> {{ $ch->titre }} </label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
                <hr>
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
                    <div class="col-md-12">
                        <div id="progressbr-container" style="display:none;">
                            <div  id="progress-bar-status-show">	</div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center">
                            <div id="loader" style="display:none;">
                                <img  src="{{ asset ('assets/backend/img/LoaderIcon.gif') }}" />
                            </div>
                        </div>
                    </div>

                    <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Ajouter Le Cours"></p>

                    <div class="form-group">
                        <div id="toshow" style="visibility:hidden;"></div>
                    </div>
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

    <script src="{{  asset('assets/backend/js/file_upload.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            $('#imageupload').submit(function(e) {

                if ($('#type_v').is(':checked')){
                    if($('#video').val()) {
                        e.preventDefault();

                        $("#progress-bar-status-show").width('0%');

                        /* image traitement */
                        var file_details = document.getElementById("video").files[0];
                        var extension = file_details['name'].split(".");

                        var allowed_extension = ["webm", "mp4", "video/mp4", "'video/x-f4v", "video/webm", "video/x-flv"];
                        var check_for_valid_ext = allowed_extension.indexOf(extension[1]);

                        if (file_details['size'] > 268435456) {
                            alert('Veuillez télécharger un fichier inférieur à 128 MB');
                            return false;
                        } else if (check_for_valid_ext == -1) {
                            alert('Télécharger un fichier video valide !');
                            return false;

                        }

                        $('#loader').show();
                        $('#progressbr-container').show();
                        $(this).ajaxSubmit({
                            target:   '#toshow',
                            beforeSubmit: function() {
                                $("#progress-bar-status-show").width('0%');
                            },
                            uploadProgress: function (event, position, total, percentComplete){
                                $("#progress-bar-status-show").width(percentComplete + '%');
                                $("#progress-bar-status-show").html('<div id="progress-percent">' + percentComplete +' %</div>');
                            },
                            success:function (){
                                $('#loader').hide();
                                $('#progressbr-container').hide();
                                window.location.href = "{{ url('coach-admin/formations-courses') }}";
                            },
                            resetForm: true

                        });
                        return false;

                    }

                }else if($('#type_p').is(':checked')) {
                    e.preventDefault();

                    $("#progress-bar-status-show").width('0%');
                    /* pdf traitement */
                    if ($('#pdf').val()) {
                        var file_details2 = document.getElementById("pdf").files[0];
                        var extension2 = file_details2['name'].split(".");

                        var allowed_extension2 = ["PDF", "pdf", "doc", "docx", "DOC", "DOCX", "jpg", "JPG", "png", "PNG"];
                        var check_for_valid_ext2 = allowed_extension2.indexOf(extension2[1]);

                        if (file_details2['size'] > 268435456) {
                            alert('Veuillez télécharger un fichier inférieur à 128 MB');
                            return false;
                        } else if (check_for_valid_ext2 == -1) {
                            alert('Télécharger un fichier valide !');
                            return false;
                        }

                        $('#loader').show();
                        $('#progressbr-container').show();
                        $(this).ajaxSubmit({
                            target: '#toshow',
                            beforeSubmit: function () {
                                $("#progress-bar-status-show").width('0%');
                            },
                            uploadProgress: function (event, position, total, percentComplete) {
                                $("#progress-bar-status-show").width(percentComplete + '%');
                                $("#progress-bar-status-show").html('<div id="progress-percent">' + percentComplete + ' %</div>');
                            },
                            success: function () {
                                $('#loader').hide();
                                $('#progressbr-container').hide();
                                window.location.href = "{{ url('coach-admin/formations-courses') }}";
                            },
                            resetForm: true

                        });
                        return false;

                    }
                }
            });
        });

    </script>
@endsection
