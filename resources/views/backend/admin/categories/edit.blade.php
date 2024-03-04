@extends("layouts.admin-master")

@section("addstyles")
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/css/form-upload.css') }}">
@endsection

@section("content")
    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Modifier une catégorie</li>
        </ol>

        <form method="post" id="imageupload" action="{{ url("admin/categories/".$categorie->id) }}"  enctype="multipart/form-data" >
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}
            <div class="box_general padding_bottom">
                <div class="header_box version_2">
                    <h2><i class="fa fa-file"></i>Veuillez s'il vous plaît remplir les informations suivantes</h2>
                </div>
                <!-- /row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group text-center">
                            <label class="col-12">Image</label>
                            @if($categorie->image !="")
                                <img src="{{ asset( 'assets/categories/'.$categorie->image) }}" id="image1" width="500px" height="350" alt="" >
                            @else
                                <img src="{{asset('assets/backend/img/cat.jpg')}}" alt="" id="image2" >
                            @endif
                            <input type="file" id="image" class="form-control mt-3" onchange="readURL1(this);" name="image">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group  @if($errors->get('nom')) has-error @endif ">
                            <label>Nom du Catégorie <span class="required">*</span></label>
                            <input required type="text" value="{{ $categorie->nom }}" placeholder="Tappez le nom du catégorie ici..." class="form-control"  name="nom">
                            @if($errors->get('nom'))
                                @foreach($errors->get('nom') as $message)
                                    <li class="required">
                                        {{ $message }}
                                    </li>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Type de Formation <span class="required">*</span></label>
                            <select required name="status" class="form-control" id="status">
                                <option @if( $categorie->status ==  1) selected @endif  value="1">Afficher</option>
                                <option @if( $categorie->status ==  0) selected @endif value="0">Non Aficher</option>
                            </select>
                        </div>
                    </div>
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

                    <p class="col-md-12 text-center"><input type="submit" class="btn_1 medium" value="Enregistrer"></p>
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

@section("addscript")
    <script src="{{  asset('assets/backend/js/file_upload.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageupload').submit(function(e) {
                if($('#image').val()) {
                    e.preventDefault();

                    $("#progress-bar-status-show").width('0%');

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
                        if(file_details['size'] <= 419430400 && check_for_valid_ext != -1)
                        {
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
                                    window.location.href = "{{ url('admin/categories') }}";
                                },
                                resetForm: true

                            });
                            return false;
                        }

                    }
                }
            });
        });

    </script>
    <script>
        function readURL1(input) {
            if (input.files && input.files[0]) {

                var reader = new FileReader();

                reader.onload = function (e) {

                    $('#image1').attr('src', e.target.result);
                    $('#image2').attr('src', e.target.result);

                };

                reader.readAsDataURL(input.files[0]);

            }

        }
    </script>
@endsection