@extends("layouts.coach-master")

@section("addheaderscript")
    <script src="{{asset("assets/backend/js")}}/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#editor',
            skin: 'bootstrap',
            // plugins: 'lists, link, image, media',
            plugins: 'lists, link',
            toolbar: 'h1 h2 h3 bold italic strikethrough blockquote bullist numlist backcolor | link image media | removeformat help',
            menubar: false
        });
    </script>

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
                <li class="breadcrumb-item active">Modifier une consultation</li>
            </ol>
            <form method="post" id="imageupload" action=" {{ url('coach-admin/consultations/'. $consultation->id) }} " enctype="multipart/form-data" >
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les inconsultations suivantes</h2>
                    </div>
                    <!-- /row-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="col-12">Image de consultation <span class="required">*</span></label>
                                <img src=" {{ asset('assets/consultations/'. $consultation->image) }} " id="image1" height="325px" width="100%" alt="" >
                                <input type="file" class="form-control mt-3" id="image" name="image"  onchange="readURL1(this);">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group text-center">
                                <label class="col-12">Une Video presentation </label>
                                @if ( $consultation->video !="")
                                <video width="100%" controls height="325px" id="vid">
                                    <source src="{{ asset('assets/consultations/'. $consultation->video) }}"  type="video/mp4">
                                    Votre navigateur ne prend pas en charge la balise vidéo.
                                </video>
                                @else
                                    <img height="325px" width="100%" src="{{ asset('assets/backend/img/cat.jpg') }}"  alt="" >
                                @endif
                                <img src=" {{ asset('assets/backend/img/cat.jpg') }}" height="325px" style="display: none"  id="img" alt="" >
                                <input type="file" class="form-control mt-3" id="video" name="video"  onchange="readURL2(this);">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Catégorie de le consultation <span class="required">*</span></label>
                                <select name="categorie_id" required class="form-control" id="categorie_id">
                                    @foreach($categories as $cat)
                                        <option @if($consultation->categorie_id ==  $cat->id ) selected @endif  value="{{ $cat->id }}">{{ $cat->nom }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group @if($errors->get('titre')) has-error @endif ">
                                <label>Nom du consultation <span class="required">*</span></label>
                                <input type="text" value="{{ $consultation->titre }}" placeholder="Tappez le titre du catégorie ici..." class="form-control"  required name="titre">
                                @if($errors->get('titre'))
                                    @foreach($errors->get('titre') as $message)
                                        <li class="required">
                                            {{ $message }}
                                        </li>
                                    @endforeach
                                @endif
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Type de Consultation <span class="required">*</span></label>
                                <select name="type" required class="form-control" id="type">
                                    <option value="">--séléctionnez--</option>
                                    <option @if($consultation->type ==  1 ) selected @endif value="1">Consultation Sur Place</option>
                                    <option @if($consultation->type ==  3 ) selected @endif value="3">Consultation en Live</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Prix /Dhs<span class="required">*</span>   </label>
                                <input type="text" value="{{ $consultation->prix }}" placeholder="exemple : 350 " class="form-control" name="prix" required >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nouveau Prix /Dhs</label>
                                <input type="text" value="{{ $consultation->new_prix }}" placeholder="exemple : 250" class="form-control" name="new_prix" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description <span class="required">*</span>   </label>
                                <textarea name="description" placeholder="tappez ici une description concerne la consultation..." class="form-control" id="editor" rows="3">{{ $consultation->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>La date(pour consultation sur place/Live)</label>
                                <input type="datetime-local" value="{{ date('Y-m-d\TH:i', strtotime( $consultation->date)) }}" class="form-control" name="date" required >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lieu(pour consultation sur place)</label>
                                <input type="text" value="{{ $consultation->lieu }}" placeholder="Tappez ici l'adresse exact de consultation" name="lieu" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Disponibilité sur le Site <span class="required">*</span></label>
                                <select name="status" class="form-control" id="status" required>
                                    <option @if($consultation->status ==  1 ) selected @endif value="1"> Afficher</option>
                                    <option @if($consultation->status ==  0 ) selected @endif value="0"> Non Afficher</option>
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

                        <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Modifier la consultation"></p>

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
    <script src="{{ asset("assets/backend/js") }}/jquery-3.4.1.slim.min.js" ></script>
    <script src="{{ asset("assets/backend/js") }}/popper.min.js"></script>
    <script src="{{ asset("assets/backend/js") }}/bootstrap.min.js"></script>
    <script src="{{  asset('assets/backend/js/file_upload.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageupload').submit(function(e) {
                if($('#image').val()) {
                    e.preventDefault();

                    $("#progress-bar-status-show").width('0%');

                    /* image traitement */
                    var file_details = document.getElementById("image").files[0];
                    var extension = file_details['name'].split(".");

                    var allowed_extension = ["jpeg", "jpg", "png", "gif", "JPEG", "JPG", "PNG", "GIF"];
                    var check_for_valid_ext = allowed_extension.indexOf(extension[1]);

                    if (file_details['size'] > 2097152) {
                        alert('Veuillez télécharger un fichier inférieur à 1 MB');
                        return false;
                    } else if (check_for_valid_ext == -1) {
                        alert('Télécharger un fichier image valide !');
                        return false;

                    } else {
                        /* video traitement */
                        if($('#video').val()) {
                            var file_details2 = document.getElementById("video").files[0];
                            var extension2 = file_details2['name'].split(".");

                            var allowed_extension2 = ["webm", "mp4", "video/mp4", "'video/x-f4v", "video/webm", "video/x-flv"];
                            var check_for_valid_ext2 = allowed_extension2.indexOf(extension2[1]);

                            if (file_details2['size'] > 41943040) {
                                alert('Veuillez télécharger une video inférieur à 20 MB');
                                return false;
                            } else if (check_for_valid_ext2 == -1) {
                                alert('Télécharger une video image valide !');
                                return false;
                            }
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
                                window.location.href = "{{ url('coach-admin/consultations') }}";
                            },
                            resetForm: true

                        });
                        return false;

                    }
                }
            });
        });

        function readURL1(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#image1').attr('src', e.target.result).width("100%").height("325px");

                };

                reader.readAsDataURL(input.files[0]);

            }

        }

        function readURL2(input) {
            $("#vid").css("display" , "none");
            $("#img").css("display" , "block");
            $('#img').attr('src', '{{ asset("assets/backend/img/video.jpg") }}').width("100%").height("325px");

        }


    </script>
@endsection
